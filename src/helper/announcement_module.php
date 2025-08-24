<?php
function getImportantAnnouncements()
{
    $announcements = list_announcements();
    $important = array();

    foreach ($announcements as $announcement) {
        if ($announcement['priority'] === 'high') {
            $important[] = $announcement;
        }
    }

    return $important;
}

function getAnnouncementById($id)
{
    $announcements = list_announcements();
    foreach ($announcements as $announcement) {
        if ($announcement['id'] == $id) {
            return $announcement;
        }
    }
    return null; // Return null if not found
}

function getAnnouncementNavigation($currentId)
{
    $announcements = list_announcements();
    $prev = null;
    $next = null;

    for ($i = 0; $i < count($announcements); $i++) {
        if ($announcements[$i]['id'] == $currentId) {
            // Get previous announcement
            if ($i > 0) {
                $prev = $announcements[$i - 1];
            }

            // Get next announcement
            if ($i < count($announcements) - 1) {
                $next = $announcements[$i + 1];
            }
            break;
        }
    }

    return array(
        'prev' => $prev,
        'next' => $next
    );
}

function getRelatedAnnouncements($currentId)
{
    $announcements = list_announcements();
    $current = getAnnouncementById($currentId);
    $related = array();

    foreach ($announcements as $announcement) {
        if ($announcement['id'] != $currentId) {
            // Prioritize same category
            if ($current && $announcement['category'] === $current['category'] && count($related) < 2) {
                $related[] = $announcement;
            }
        }
    }

    // Fill remaining slots with any other announcements
    foreach ($announcements as $announcement) {
        if ($announcement['id'] != $currentId && count($related) < 4) {
            $found = false;
            foreach ($related as $rel) {
                if ($rel['id'] == $announcement['id']) {
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $related[] = $announcement;
            }
        }
    }

    return $related;
}
