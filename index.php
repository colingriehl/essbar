<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>essbar Konstanz</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript">

function theRotator() {
    //Set the opacity of all images to 0
    $('div.rotator ul li').css({opacity: 0.0});
    $('div.picinfo ul li').css({opacity: 0.0});
	
    //Get the first image and display it (gets set to full opacity)
    $('div.rotator ul li:first').css({opacity: 1.0});
	$('div.picinfo ul li:first').css({opacity: 1.0});
        
    //Call the rotator function to run the slideshow, 6000 = change to next image after 6 seconds
    
    setInterval('rotate()',9000);
    
}

function rotate() { 
    //Get the first image
    var current = ($('div.rotator ul li.show')?  $('div.rotator ul li.show') : $('div.rotator ul li:first'));
	var currentInfo = ($('div.picinfo ul li.show')?  $('div.picinfo ul li.show') : $('div.picinfo ul li:first'));

    if ( current.length == 0 ) current = $('div.rotator ul li:first');
	if ( currentInfo.length == 0 ) currentInfo = $('div.picinfo ul li:first');

    //Get next image, when it reaches the end, rotate it back to the first image
    var next = ((current.next().length) ? ((current.next().hasClass('show')) ? $('div.rotator ul li:first') :current.next()) : $('div.rotator ul li:first'));
	var nextInfo = ((currentInfo.next().length) ? ((currentInfo.next().hasClass('show')) ? $('div.picinfo ul li:first') :currentInfo.next()) : $('div.picinfo ul li:first'));
    
    //Un-comment the 3 lines below to get the images in random order
    
    //var sibs = current.siblings();
        //var rndNum = Math.floor(Math.random() * sibs.length );
        //var next = $( sibs[ rndNum ] );
            

    //Set the fade in effect for the next image, the show class has higher z-index
    next.css({opacity: 0.0})
    .addClass('show')
    .animate({opacity: 1.0}, 3000);
	
	nextInfo.css({opacity: 0.0})
    .addClass('show')
    .animate({opacity: 1.0}, 3000);

    //Hide the current image
    current.animate({opacity: 0.0}, 3000)
    .removeClass('show');
	
	currentInfo.animate({opacity: 0.0}, 3000)
    .removeClass('show');
    
};
$(document).ready(function() {      
    //Load the slideshow
    theRotator();
    $('div.rotator').fadeIn(1000);
    $('div.rotator ul li').fadeIn(1000); // tweek for IE
	$('div.picinfo').fadeIn(1000);
    $('div.picinfo ul li').fadeIn(1000); // tweek for IE
});
</script>
</head>
<body>
<?php 
    include 'json.php';
    $json = new Services_JSON(); 
	
	
	function facebook_time_convert($timestamp) {
        // converts 2010-03-04T11:38:42Z to something normal thats usable
        sscanf($timestamp,"%u-%u-%uT%u:%u:%uZ",$year,$month,$day,
        $hour,$min,$sec);
        $newtimestamp=mktime($hour,$min,$sec,$month,$day,$year);
        return $newtimestamp;
	}
	
	function getDollarValue($object){
		foreach($object as $k => $v){
			if($k == '$t') return $v;
		}
	}

?>
	<div class="topframe">
		<div class="top">
		   <div class="header">
			   <div class="logo">ess|bar</div>
			   <div class="address">	               
					 <div class="street">Bahnhofstraße 15<br />78462 Konstanz</div>
			 <div class="open">Mo-Fr 12-14 Uhr<br />Mo-Sa ab 18 Uhr</div>
			 <div class="tel">T +49 (0) 7531 80 43 475</div>
			   </div>
			   <div class="social">
				<a title="ess|bar bei qype.com" href="http://www.qype.com/place/1861736-essbar-Konstanz" target="_blank"><img src="image/qype_32.png" /></a>
			 <a title="ess|bar bei facebook.com" href="http://www.facebook.com/pages/Essbar/158128597575739" target="_blank"><img src="image/facebook_32.png" /></a>
				</div>
		   </div>
		   <div class="slogan">
			der Anspruch Gutes<br />
			so einfach und<br />
			unkompliziert wie<br />
			möglich zu machen
			<div class="picinfo">
			<ul>
				<li class="show">(Lachstartar| Avocado | Wildkräuter)<br />
					<div class="dot">
						<img class="dott" src="image/dot_aktiv.png" />
						<img class="dott" src="image/dot_inaktiv.png" />
						<img class="dott" src="image/dot_inaktiv.png" />
						<img class="dott" src="image/dot_inaktiv.png" />
					</div>
				</li>
				<li>(Forelle im Backpapier | Fenchel | Zitrone)<br />
					<div class="dot">
						<img class="dott" src="image/dot_inaktiv.png" />
						<img class="dott" src="image/dot_aktiv.png" />
						<img class="dott" src="image/dot_inaktiv.png" />
						<img class="dott" src="image/dot_inaktiv.png" />
					</div>
				</li>
				<li>(Rhabarberstrudel | Erdbeersorbet)<br />
					<div class="dot">
						<img class="dott" src="image/dot_inaktiv.png" />
						<img class="dott" src="image/dot_inaktiv.png" />
						<img class="dott" src="image/dot_aktiv.png" />
						<img class="dott" src="image/dot_inaktiv.png" />
					</div>
				</li>
				<li>(Moshi | gemischter Sushi Teller)<br />
					<div class="dot">
						<img class="dott" src="image/dot_inaktiv.png" />
						<img class="dott" src="image/dot_inaktiv.png" />
						<img class="dott" src="image/dot_inaktiv.png" />
						<img class="dott" src="image/dot_aktiv.png" />
					</div>
				</li>
			  </ul>
			</div>			
			</div>
			
		   <div class="rotator">
			  <ul>
				<li class="show"><img src="image/rotate/01.png" width="540" height="430"  alt="pic1" /></li>
				<li><img src="image/rotate/02.png" width="540" height="430"  alt="pic1" /></li>
				<li><img src="image/rotate/03.png" width="540" height="430"  alt="pic1" /></li>
				<li><img src="image/rotate/04.png" width="540" height="430"  alt="pic1" /></li>
			  </ul>
			</div>	   
		</div>
	</div>
	<div class="middleframe">
	<div class="middle">
<?php
$request = 'http://www.blogger.com/feeds/6567822141383018801/posts/default?alt=json&max-results=4';
$curl = curl_init();
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_HTTPGET,true);
curl_setopt($curl,CURLOPT_URL,$request);
$resp = curl_exec($curl);
$resp = $json->decode($resp);
curl_close($curl);
?>
	   <div class="posts"> 
<?php
		if(!empty($resp->feed->entry)){
			foreach($resp->feed->entry as $post){		
				if(!empty($post->published)){
					echo '<p class="postdate">'.date('d.m.Y', facebook_time_convert(getDollarValue($post->published))).'</p>';			 
					echo '<div class="posttext">'.getDollarValue($post->content).'</div>';
				}
			}		
		}
?>	   
       </div>
<?php
$request = 'http://graph.facebook.com/173106166077982/photos?limit=9&fields=link,images';
$curl = curl_init();
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_HTTPGET,true);
curl_setopt($curl,CURLOPT_URL,$request);
$resp = curl_exec($curl);
$resp = $json->decode($resp);
curl_close($curl);
?>	   
	   <div class="pictures">
	   	<div class="picrow">
			<?php for($i=0;$i<=2;$i++){ ?>
			<?php if(!empty($resp->data[$i]->images)): ?>
				<?php foreach($resp->data[$i]->images as $image): ?>
				    <?php if($image->width == '540' || $image->width == '720'): ?>
				    <div class="thumbs"><a href="<?php echo $resp->data[$i]->link; ?>" target="_blank"><img src="<?php echo $image->source; ?>" height="200"/></a></div>
				    <?php endif; ?>
				<?php endforeach;?>			
			<?php else: ?>
			<div class="thumbs"><img src="image/pic.png" /></div>
			<?php endif; ?>	
			<?php } ?>
		</div>
		<div class="picrow">
			<?php for($i=3;$i<=5;$i++){ ?>
			<?php if(!empty($resp->data[$i]->images)): ?>
                <?php foreach($resp->data[$i]->images as $image): ?>
                    <?php if($image->width == '720' || $image->width == '540'): ?>
                    <div class="thumbs"><a href="<?php echo $resp->data[$i]->link; ?>" target="_blank"><img src="<?php echo $image->source; ?>" height="200"/></a></div>
                    <?php endif; ?>
                <?php endforeach;?>         
            <?php else: ?>
            <div class="thumbs"><img src="image/pic.png" /></div>
            <?php endif; ?>	
			<?php } ?>
		</div>
		<div class="picrow">
			<?php $j = 0; ?>
			<?php for($i=6;$i<=8;$i++){ ?>
			<?php if(!empty($resp->data[$i]->images)): ?>							
                <?php foreach($resp->data[$i]->images as $image): ?>
                    <?php if(($image->width == '720' || $image->width == '540') && ($j <= 2) ): ?>
                    <div class="thumbs"><a href="<?php echo $resp->data[$i]->link; ?>" target="_blank"><img src="<?php echo $image->source; ?>" height="200"/></a></div>
                    <?php $j++; ?>
                    <?php endif; ?>
                <?php endforeach;?>         
            <?php else: ?>
            <div class="thumbs"><img src="image/pic.png" /></div>
            <?php endif; ?>
			<?php } ?>
		</div>
    </div>
	</div>
	</div>
	<div class="bottomframe">
	<div class="bottom">
		<div class="reserve">
			<div class="reservetext">Reservieren Sie telefonisch unter:</div>
			<div class="reservetel">+49 (0) 75 31 80 43 475</div>
			<div class="reserveadr">Bahnhofstraße 15<br />78462 Konstanz</div>
			<div class="reserveopen">Lunch Mo-Fr<br />Dinner Mo-Sa</div>
		</div>
		<div class="imprint">
			<div class="doneby">
				<p class="plogo">ess|bar</p>
				<p class="chef">Bahnhofstr. 15<br />D – 78462 Konstanz </p>
				<p class="chef">Betreiber:<br />Julian Müller-Nestler</p>
				<p class="chef">Ust-Ident.-Nr.:<br />DE 248689172</p> 
			</div>
			<div class="imprinttext">
				Trotz sorgfältiger inhaltlicher Kontrolle übernehmen wir keine Haftung für die Inhalte externer Links. Das Angebot enthält eventuell Links zu externen Webseiten Dritter. Deshalb kann für diese fremden Inhalte auch keine Gewähr übernommen werden. Für die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der Seiten verantwortlich. Die verlinkten Seiten wurden zum Zeitpunkt der Verlinkung auf mögliche Rechtsverstößeüberprüft. Rechtswidrige Inhalte waren zum Zeitpunkt der Verlinkung nicht erkennbar. Eine permanente inhaltliche Kontrolle der verlinkten Seiten ist jedoch ohne konkrete Anhaltspunkte einer Rechtsverletzung nicht zumutbar. Bei Bekanntwerden von Rechtsverletzungen werden derartige Links umgehend entfernt. Die durch die Seitenbetreiber erstellten Inhalte und Bilder auf diesen Seiten unterliegen dem deutschen Urheberrecht. Die Vervielfältigung, Bearbeitung, Verbreitung und jede Art der Verwertung außerhalb der Grenzen des Urheberrechtes bedürfen der schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers. Downloads und Kopien dieser Seite sind nur für den privaten, nicht kommerziellen Gebrauch gestattet. Soweit die Inhalte nicht vom Betreiber erstellt wurden, werden die Urheberrechte Dritter beachtet. Insbesondere werden Inhalte Dritter als solche gekennzeichnet. Sollten Sie trotzdem auf eine Urheberrechtsverletzung aufmerksam werden, bitten wir um einen entsprechenden Hinweis.
			</div>
		</div>
	</div>
	</div>
</body>
</html>
