<?php
	
	header("Content-type: text/css; charset: UTF-8");
?>

@import url('https://fonts.googleapis.com/css?family=Anton|Archivo+Black|Baloo+Bhai|Lalezar|Passion+One|Staatliches&display=swap');

@font-face {
    font-family: "FrontPageNeue";
    src: url("public/fonts/FrontPageNeue.otf");
    src: url("public/fonts/FrontPageNeue.woff") format("woff");
}

@font-face {
    font-family: "Junegull";
    src: url("public/fonts/junegull.ttf") format("ttf"),
    url('public/fonts/junegull.ttf')  format('truetype');
}

@font-face {
    font-family: "Timeline";
    src: url("public/fonts/Timeline.ttf") format("ttf"),
    url('public/fonts/Timeline.ttf')  format('truetype');
    
}

page {
    background-image: url("public/img/cert_bg.png");
    background-size: cover;
    display: block;
}

page[size="A4"][layout="landscape"] {
    margin: 0 !important;
    background-image: url("public/img/cert_bg.png");
    background-size: cover;
}

@media print {
    body, page {
        margin: 0;
        box-shadow: 0;
    }
}

#landscapePage .content {
    padding: 0;
    background-image: url("public/img/cert_bg.png");
    background-size: cover;
}

#landscapePage .content .header {
    line-height: -50px;
    margin-bottom: 40px;
}

#landscapePage .content .header h2 {
    letter-spacing: 5px;
    font-size: 50px;
    font-family: 'Anton', sans-serif;
    <!--font-family: 'Archivo Black', sans-serif;-->
    <!--font-family: 'Passion One', cursive;-->
    <!--font-family: 'Lalezar', cursive;-->
    <!--font-family: 'Baloo Bhai', cursive;-->
    <!--`font-family: 'Staatliches', cursive;-->
    margin: 0 !important;
}

#landscapePage .content .header h4 {
    letter-spacing: 5px;
    font-size: 20px;
    margin-top: -10px;
    margin: 0 !important;
    font-family: 'Anton', sans-serif;
}

#landscapePage .content .header h4 span {
    letter-spacing: 5px;
    font-size: 20px;
    font-family: 'Anton', sans-serif;
    color: #5abe55;
}


#landscapePage .content .description {
    color: #7b7979;
    font-size: 14px;
    width: 600px;
    margin-bottom: 50px;
    font-family: "Lucida Fax", cursive;
}

#landscapePage .content .applicant {
    line-height: 0px;
}

#landscapePage .content .applicant p {
    letter-spacing: 1px;
    font-family: "Consolas", cursive;
    font-size: 18px;
    font-weight: bold;
}

#landscapePage .content .applicant h1 {
    margin: 0 !important;
    color: #336699;
    font-size: 30px;
    font-family: "Timeline", cursive;
}

#landscapePage .content .applicant h4 {
    font-family: "Front Page Neue", cursive;
    font-size: 23pt;
    letter-spacing: 1px;
    color: #abaaaa;
}

#landscapePage .content .address {
    margin-top: 30px !important;
    color: #7b7979;
    font-family: "Lucida Fax", cursive;
    line-height: 5px;
}

#landscapePage .content .signitures .names {
    display: flex;
    margin-top: 0px;
}

#landscapePage .content .signitures h3, 
#landscapePage .content .signitures h4 {
    margin: 0 !important;
}

#landscapePage .content .signitures h3 {
    color: #b3b3b3;
    font-size: 20px;
    letter-spacing: 2px;
    text-transform: uppercase;
}

#landscapePage .content .signitures h4 {
    color: #5abe55;
    font-size: 18px;
    font-family: "Lucida Fax", cursive;
    letter-spacing: 1px;
}

#landscapePage .content .signitures .sign-space {
    display: flex;
}

#landscapePage .content .signitures .sign-space .signiture-1 {
    width: 190px;
    padding: 1.5em;
    border-bottom: 2px solid #555;
}

#landscapePage .content .signitures .sign-space .signiture-2 {
    width: 190px;
    padding: 1.5em;
    border-bottom: 2px solid #555;
}