            </div>
            </div>
            </div>

            <!-- Bootstrap 5 JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

            <!-- jQuery -->
            <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

            <!-- Custom Admin JS -->
            <script>
                const navbarCategories = [
                    'posts',
                    'categories',
                    'home',
                    // Sắp xếp theo thứ tự ưu tiên, giảm dần từ trên xuống
                ];

                document.addEventListener('DOMContentLoaded', function() {
                    let url = window.location.href;

                    navbarCategories.forEach(function(category) {
                        if (url.includes(category)) {
                            url = category;
                        }
                    });

                    document.querySelectorAll('#sidebar li a').forEach(a => a.classList.remove('active'));
                    document.querySelector(`#sidebar li a[href*="${url}"]`)?.classList.add('active');
                    document.querySelectorAll('#sidebarMobile li a').forEach(a => a.classList.remove('active'));
                    document.querySelector(`#sidebarMobile li a[href*="${url}"]`)?.classList.add('active');

                });
            </script>

            <script>
                $(document).ready(function() {
                    // Auto-hide alerts
                    setTimeout(function() {
                        $('.alert').fadeOut('slow');
                    }, 5000);

                    // Confirm delete actions
                    $('.btn-delete').click(function(e) {
                        e.preventDefault();
                        const href = $(this).attr('href');

                        Swal.fire({
                            title: 'Bạn có chắc chắn?',
                            text: "Hành động này không thể hoàn tác!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#ef4444',
                            cancelButtonColor: '#6b7280',
                            confirmButtonText: 'Xóa',
                            cancelButtonText: 'Hủy'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = href;
                            }
                        });
                    });

                    // Character counter for excerpts
                    $('#excerpt').on('input', function() {
                        const maxLength = 300;
                        const currentLength = $(this).val().length;
                        const remaining = maxLength - currentLength;

                        $('#excerptCounter').text(remaining + ' ký tự còn lại');

                        if (remaining < 0) {
                            $('#excerptCounter').addClass('text-danger');
                        } else if (remaining < 50) {
                            $('#excerptCounter').removeClass('text-danger').addClass('text-warning');
                        } else {
                            $('#excerptCounter').removeClass('text-danger text-warning').addClass('text-muted');
                        }
                    });

                    // SEO title and meta description counters
                    $('#metaTitle').on('input', function() {
                        const maxLength = 60;
                        const currentLength = $(this).val().length;
                        const remaining = maxLength - currentLength;

                        $('#metaTitleCounter').text(remaining + ' ký tự còn lại');

                        if (remaining < 0) {
                            $('#metaTitleCounter').addClass('text-danger');
                        } else if (remaining < 10) {
                            $('#metaTitleCounter').removeClass('text-danger').addClass('text-warning');
                        } else {
                            $('#metaTitleCounter').removeClass('text-danger text-warning').addClass('text-muted');
                        }
                    });

                    $('#metaDescription').on('input', function() {
                        const maxLength = 160;
                        const currentLength = $(this).val().length;
                        const remaining = maxLength - currentLength;

                        $('#metaDescCounter').text(remaining + ' ký tự còn lại');

                        if (remaining < 0) {
                            $('#metaDescCounter').addClass('text-danger');
                        } else if (remaining < 20) {
                            $('#metaDescCounter').removeClass('text-danger').addClass('text-warning');
                        } else {
                            $('#metaDescCounter').removeClass('text-danger text-warning').addClass('text-muted');
                        }
                    });

                    // Image preview
                    $('#featuredImage').change(function() {
                        const file = this.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                $('#imagePreview').html('<img src="' + e.target.result +
                                    '" class="img-fluid rounded" style="max-height: 200px;" loading="lazy">');
                            };
                            reader.readAsDataURL(file);
                        }
                    });

                    // Initialize tooltips
                    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                        return new bootstrap.Tooltip(tooltipTriggerEl);
                    });

                    // Search functionality
                    $('#searchInput').on('keyup', function() {
                        const searchTerm = $(this).val();
                        if (searchTerm.length > 2 || searchTerm.length === 0) {
                            clearTimeout(window.searchTimeout);
                            window.searchTimeout = setTimeout(function() {
                                window.location.href = updateUrlParameter(window.location.href, 'search',
                                    searchTerm);
                            }, 500);
                        }
                    });

                    // Bulk actions
                    $('#selectAll').change(function() {
                        $('.post-checkbox').prop('checked', $(this).prop('checked'));
                        toggleBulkActions();
                    });

                    $('.post-checkbox').change(function() {
                        toggleBulkActions();
                    });

                    function toggleBulkActions() {
                        const checkedCount = $('.post-checkbox:checked').length;
                        if (checkedCount > 0) {
                            $('#bulkActions').show();
                            $('#bulkCount').text(checkedCount);
                        } else {
                            $('#bulkActions').hide();
                        }
                    }
                });

                // Helper function to update URL parameters
                function updateUrlParameter(url, param, paramVal) {
                    var newAdditionalURL = "";
                    var tempArray = url.split("?");
                    var baseURL = tempArray[0];
                    var additionalURL = tempArray[1];
                    var temp = "";
                    if (additionalURL) {
                        tempArray = additionalURL.split("&");
                        for (var i = 0; i < tempArray.length; i++) {
                            if (tempArray[i].split('=')[0] != param) {
                                newAdditionalURL += temp + tempArray[i];
                                temp = "&";
                            }
                        }
                    }
                    if (paramVal) {
                        var rows_txt = temp + "" + param + "=" + paramVal;
                        return baseURL + "?" + newAdditionalURL + rows_txt;
                    } else {
                        return baseURL + "?" + newAdditionalURL;
                    }
                }

                // Show success message if exists
                <?php if (isset($_SESSION['success_message'])): ?>
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công!',
                        text: '<?php echo $_SESSION['success_message']; ?>',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    <?php unset($_SESSION['success_message']); ?>
                <?php endif; ?>

                // Show error message if exists
                <?php if (isset($_SESSION['error_message'])): ?>
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi!',
                        text: '<?php echo $_SESSION['error_message']; ?>'
                    });
                    <?php unset($_SESSION['error_message']); ?>
                <?php endif; ?>
            </script>

            <?php if (isset($additionalJS)): ?>
                <?php echo $additionalJS; ?>
            <?php endif; ?>