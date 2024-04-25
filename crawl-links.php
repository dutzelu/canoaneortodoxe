<?php
// Function to crawl a URL and extract links
function crawl($url, $depth = 5) {
    static $seen = array(); // Array to keep track of visited URLs
    if (isset($seen[$url]) || $depth === 0) {
        return;
    }

    $seen[$url] = true;

    $html = file_get_contents($url); // Get the HTML content of the page
    if ($html === false) {
        return;
    }

    // Extract links using regular expression
    preg_match_all('/<a\s+(?:[^>]*?\s+)?href=(["\'])(.*?)\1/i', $html, $matches);
    $links = $matches[2];

    $nr=1;
    foreach ($links as $link) {
        // Clean the link
        $link = trim($link);
        $link = filter_var($link, FILTER_SANITIZE_URL);

        // Handle relative URLs
        if (substr($link, 0, 1) === '/' || substr($link, 0, 4) === 'http') {
            $next_url = $link;
        } else {
            $next_url = rtrim($url, '/') . '/' . ltrim($link, '/');
        }

        // Output the link
        echo $nr . '. ' . $next_url . "\n";
        echo "<br>";
        $nr++;
        // Recursively crawl the next URL
        crawl($next_url, $depth - 1);
    }
}

// Start crawling from the root URL of your website
crawl('http://localhost/canoane/index.php');
