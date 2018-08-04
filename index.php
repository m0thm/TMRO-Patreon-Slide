<?php
/**
 * Created by PhpStorm.
 * User: Vito
 * Date: 28.7.2018.
 * Time: 19:00
 */

$font_max_height = 64;
$pledges = [
                'escape'    =>  'ESCAPE VELOCITY CITIZENS',
                'orbital'   =>  'ORBITAL CITIZENS',
                'suborbital'=>  'SUBORBITAL CITIZENS',
                'ground'    =>  'GROUND SUPPORT'
            ];
$subtitle = 'patreon.com/tmro';
if (isset($_GET['pledge']) && !empty($_GET['pledge'])) {
    if (in_array($_GET['pledge'], array_keys($pledges))) $pledge = $_GET['pledge'];
    else if ( $_GET['pledge'] = 'random' ) $pledge = array_rand($pledges);
    else $pledge = 'escape';
} else {
    $pledge = 'escape';
}

if (isset($_GET['test'])) {
    $patrons_text_full = "John Bensted, Chad Colopy, Brian Simmons, Lauren & Jim Zeller, Shaky, Luke Bastendorff, Alexis Layton, Douglas A. Gwyn, Trent Castanaveras, Jason Hammond, Joseph Pistritto, William Baughman, Sinisha Arsovski, Max Lightfoot, Tom Lokhorst, Stuart Woods, Dimitar Ralev, cpu2k6, Chris Radcliff, Julian Adler, Mark Cusimano, Jonothan Vaughn, Eric Younge, Kevin McCoy, James McKenzie, Brian Godfrey, Max Haot, Jonathan Zbikowski, Miguel Angel Vaquero Lopez, The Maynard, Randy, Nicholas Santos, Jean-Frederic Beaudet, Leland Rogers, GadgetNate, DadDog and MomDog, Rick, Nitesh Patel, Roby Thomas, Ivan, Gary Oberoi, Paul Parsons, Jacqueline Quackenbush, Julian Ropke, Oleg Kokorin, Derek Rowe, Michael Cole, Burtrand AF Paulie, The Woodards, Brandon Rowe, Gabriel Gilliam, ticklestuff, Tyler Neumann, David Bunds, Robert Cain, Luca Leo Dyrvang, Mac Malkawi, Jack Hydrazine, Arleigh Tegarden, John Bensted, Chad Colopy, Brian Simmons, Lauren & Jim Zeller, Shaky, Luke Bastendorff, Alexis Layton, Douglas A. Gwyn, Trent Castanaveras, Jason Hammond, Joseph Pistritto, William Baughman, Sinisha Arsovski, Max Lightfoot, Tom Lokhorst, Stuart Woods, Dimitar Ralev, cpu2k6, Chris Radcliff, Julian Adler, Mark Cusimano, Jonothan Vaughn, Eric Younge, Kevin McCoy, James McKenzie, Brian Godfrey, Max Haot, Jonathan Zbikowski, Miguel Angel Vaquero Lopez, The Maynard, Randy, Nicholas Santos, Jean-Frederic Beaudet, Leland Rogers, GadgetNate, DadDog and MomDog, Rick, Nitesh Patel, Roby Thomas, Ivan, Gary Oberoi, Paul Parsons, Jacqueline Quackenbush, Julian Ropke, Oleg Kokorin, Derek Rowe, Michael Cole, Burtrand AF Paulie, The Woodards, Brandon Rowe, Gabriel Gilliam, ticklestuff, Tyler Neumann, David Bunds, Robert Cain, Luca Leo Dyrvang, Mac Malkawi, Jack Hydrazine, Arleigh Tegarden, John Bensted, Chad Colopy, Brian Simmons, Lauren & Jim Zeller, Shaky, Luke Bastendorff, Alexis Layton, Douglas A. Gwyn, Trent Castanaveras, Jason Hammond, Joseph Pistritto, William Baughman, Sinisha Arsovski, Max Lightfoot, Tom Lokhorst, Stuart Woods, Dimitar Ralev, cpu2k6, Chris Radcliff, Julian Adler, Mark Cusimano, Jonothan Vaughn, Eric Younge, Kevin McCoy, James McKenzie, Brian Godfrey, Max Haot, Jonathan Zbikowski, Miguel Angel Vaquero Lopez, The Maynard, Randy, Nicholas Santos, Jean-Frederic Beaudet, Leland Rogers, GadgetNate, DadDog and MomDog, Rick, Nitesh Patel, Roby Thomas, Ivan, Gary Oberoi, Paul Parsons, Jacqueline Quackenbush, Julian Ropke, Oleg Kokorin, Derek Rowe, Michael Cole, Burtrand AF Paulie, The Woodards, Brandon Rowe, Gabriel Gilliam, ticklestuff, Tyler Neumann, David Bunds, Robert Cain, Luca Leo Dyrvang, Mac Malkawi, Jack Hydrazine, Arleigh Tegarden, John Bensted, Chad Colopy, Brian Simmons, Lauren & Jim Zeller, Shaky, Luke Bastendorff, Alexis Layton, Douglas A. Gwyn, Trent Castanaveras, Jason Hammond, Joseph Pistritto, William Baughman, Sinisha Arsovski, Max Lightfoot, Tom Lokhorst, Stuart Woods, Dimitar Ralev, cpu2k6, Chris Radcliff, Julian Adler, Mark Cusimano, Jonothan Vaughn, Eric Younge, Kevin McCoy, James McKenzie, Brian Godfrey, Max Haot, Jonathan Zbikowski, Miguel Angel Vaquero Lopez, The Maynard, Randy, Nicholas Santos, Jean-Frederic Beaudet, Leland Rogers, GadgetNate, DadDog and MomDog, Rick, Nitesh Patel, Roby Thomas, Ivan, Gary Oberoi, Paul Parsons, Jacqueline Quackenbush, Julian Ropke, Oleg Kokorin, Derek Rowe, Michael Cole, Burtrand AF Paulie, The Woodards, Brandon Rowe, Gabriel Gilliam, ticklestuff, Tyler Neumann, David Bunds, Robert Cain, Luca Leo Dyrvang, Mac Malkawi, Jack Hydrazine, Arleigh Tegarden";
    $patrons_array = explode(", ",$patrons_text_full);
    $num_patrons = count($patrons_array);
    $rnd = rand(10,$num_patrons);
    $patrons_text = implode(", ",array_slice($patrons_array,0,$rnd));
} else {
    $patrons_text = 'to do... get patron list from patreon';
}


function font_fit(  $text,
                    $div_width = 1750,      // in px
                    $div_height = 760,      // in px
                    $font_max_height = 64,  // in px
                    $font_width_height_ar = 0.52,       // font width to height aspect ratio. For Arial, it's 0.52
                    $line_height_increase_percent = 25, // in percent, line height = font size + x%
                    $width_aspect_ratio_cutoff = 400    // in chars. Justify text alignment eats up much more space with
                                                        // bigger font sizes. Assume char width = 1/2 * font size (width)
                                                        // unless number of characters in text below cutoff number.
                                                        // If so, use 2/3 * font size as char width.
                    ) {

    $line_height_increase = 1 + ( $line_height_increase_percent / 100 );
    $text_length = mb_strlen($text);
    if ( $text_length > $width_aspect_ratio_cutoff ) {
        $font_width_ratio = $font_width_height_ar;
    } else {
        $font_width_ratio = $font_width_height_ar * 4/3;
    }
    $font_size = sqrt( ( $div_width * $div_height ) / ( $text_length * ( $line_height_increase * $font_width_ratio ) ) );
    if ( $font_size > $font_max_height ) {
        $font_size = $font_max_height;
    }
    return $font_size;
}



$patrons_font_size = font_fit($patrons_text);
$patrons_line_height = $patrons_font_size*1.25;
?>
<html>
<head>
    <title>TMRO slate</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/tmro-slate.css">
</head>
<body class="<?php echo $pledge?>">
<div id="content">
    <div id="text_area">
        <div class="header">
            <div class="swoosh"></div>
            <h1 class="title"><?php echo $pledges[$pledge]?></h1>
            <h3 class="subtitle"><?php echo $subtitle?></h3>
        </div>
        <p class="patrons" style="font-size: <?php echo $patrons_font_size?>px; line-height: <?php echo $patrons_line_height?>px"><?php echo $patrons_text ?></p>
    </div>
</div>
<div class="debug"><?php echo $patrons_text_length." ".$patrons_font_size." ".$patrons_line_height?></div>
</body>
</html>
