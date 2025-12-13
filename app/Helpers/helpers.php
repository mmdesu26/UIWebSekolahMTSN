<?php

if (!function_exists('getYoutubeEmbed')) {
    /**
     * Convert YouTube URL to embed iframe
     */
    function getYoutubeEmbed($url) {
        if (empty($url)) {
            return '';
        }

        // Extract video ID
        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $url, $matches);
        
        if (isset($matches[1])) {
            $videoId = $matches[1];
            return '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/' . $videoId . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" style="border-radius: 8px;"></iframe>';
        }

        return '<div style="padding: 20px; text-align: center; background: #f0f0f0; border-radius: 8px;"><i class="fas fa-exclamation-triangle"></i> Invalid YouTube URL</div>';
    }
}

if (!function_exists('getTikTokEmbed')) {
    /**
     * Convert TikTok URL to embed
     */
    function getTikTokEmbed($url) {
        if (empty($url)) {
            return '';
        }

        // Extract video ID from TikTok URL
        preg_match('/tiktok\.com\/@[^\/]+\/video\/(\d+)/i', $url, $matches);
        
        if (isset($matches[1])) {
            $videoId = $matches[1];
            // TikTok embed v2
            return '<iframe src="https://www.tiktok.com/embed/v2/' . $videoId . '" width="100%" height="100%" frameborder="0" scrolling="no" allow="encrypted-media;" allowfullscreen loading="lazy" style="border-radius: 8px;"></iframe>';
        }

        // Fallback: Use blockquote embed with script
        return '<blockquote class="tiktok-embed" cite="' . htmlspecialchars($url) . '" data-video-id="" style="max-width: 605px; min-width: 325px; margin: 0 auto; border-radius: 8px;"> <section> <a target="_blank" title="TikTok" href="' . htmlspecialchars($url) . '">View on TikTok</a> </section> </blockquote> <script async src="https://www.tiktok.com/embed.js"></script>';
    }
}

if (!function_exists('getInstagramEmbed')) {
    /**
     * Convert Instagram URL to embed iframe
     */
    function getInstagramEmbed($url) {
        if (empty($url)) {
            return '';
        }

        // Make sure URL ends with /embed
        $cleanUrl = rtrim($url, '/');
        
        // If URL doesn't contain /embed, add it
        if (!str_contains($cleanUrl, '/embed')) {
            $embedUrl = $cleanUrl . '/embed';
        } else {
            $embedUrl = $cleanUrl;
        }
        
        return '<iframe src="' . htmlspecialchars($embedUrl) . '" width="100%" height="100%" frameborder="0" scrolling="no" allowtransparency="true" loading="lazy" style="border-radius: 8px;"></iframe>';
    }
}

if (!function_exists('isEmbedLink')) {
    /**
     * Check if URL is an embed link (YouTube, TikTok, Instagram)
     */
    function isEmbedLink($url) {
        if (empty($url)) {
            return false;
        }

        $embedPatterns = [
            'youtube.com',
            'youtu.be',
            'tiktok.com',
            'instagram.com'
        ];

        foreach ($embedPatterns as $pattern) {
            if (stripos($url, $pattern) !== false) {
                return true;
            }
        }

        return false;
    }
}