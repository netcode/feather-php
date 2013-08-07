<?php
/**
**   *                   // Match all request URIs
**  [i]                  // Match an integer
**  [i:id]               // Match an integer as 'id'
**  [a:action]           // Match alphanumeric characters as 'action'
**  [h:key]              // Match hexadecimal characters as 'key'
**  [:action]            // Match anything up to the next / or end of the URI as 'action'
**  [create|edit:action] // Match either 'create' or 'edit' as 'action'
**  [*]                  // Catch all (lazy, stops at the next trailing slash)
**  [*:trailing]         // Catch all as 'trailing' (lazy)
**  [**:trailing]        // Catch all (possessive - will match the rest of the URI)
**  .[:format]?          // Match an optional parameter 'format' - a / or . before the block is also optional
**
** Some more complicated examples
**
**  /posts/[*:title][i:id]     // Matches "/posts/this-is-a-title-123"
**  /[:controller]?/[:action]? // Matches the typical /controller/action format
*
**/

$router->map('GET|POST','/', 'homeController#welcome', 'home');
