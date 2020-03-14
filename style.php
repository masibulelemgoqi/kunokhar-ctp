<?php
	
	header("Content-type: text/css; charset: UTF-8");
?>

@import url('public/fonts/FrontPageNeue.otf');
@import url('public/fonts/FrontPageNeue.woff');
@import url('public/fonts/junegull.ttf');
@import url('public/fonts/Timeline.ttf');
page {
    background: white;
    display: block;
    margin: 0 auto;
    margin-bottom: 0.5cm;
    margin-top: 0.5cm;
    box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}

page[size="A4"][layout="landscape"] {
    background-image: url("public/img/cert_bg.png");
    background-size: contain;

}

@media print {
    body, page {
        margin: 0;
        box-shadow: 0;
    }
}

label {
    font-family: 'Cabin', sans-serif;
    font-weight: bold;
}

.add-btn {
    background-color: #e6e6e6;
    color: #222;
    position: absolute;
    right: 4px;
    top: 4px;
    transition: 0.6s ease;
}

.add-btn:hover {
    background-color: #fff !important;
    color: #222 !important;
}

#landscapePage .content {
    padding: 6em 2em 4em 3em;
}

#landscapePage .content .header {
    line-height: -50px;
    margin-bottom: 40px;
}

#landscapePage .content .header h2 {
    letter-spacing: 5px;
    font-size: 50px;
    font-family: "Front Page Neue", cursive;
    margin: 0 !important;
}

#landscapePage .content .header h4 {
    letter-spacing: 5px;
    font-size: 20px;
    margin: 0 !important;
    font-family: "Front Page Neue", cursive;
}

#landscapePage .content .header h4 span {
    letter-spacing: 5px;
    font-size: 20px;
    font-family: "Front Page Neue", cursive;
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
    margin-top: 60px;
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

#landscapePage .content .signitures .applicant-sign {
    margin-right: 25%;
}

#landscapePage .content .signitures .sign-space {
    display: flex;
}

#landscapePage .content .signitures .sign-space .signiture-1 {
    width: 190px;
    padding: 1.5em;
    border-bottom: 2px solid #555;
    margin-right: 21.5%;
}

#landscapePage .content .signitures .sign-space .signiture-2 {
    width: 190px;
    padding: 1.5em;
    border-bottom: 2px solid #555;
}