<?php

header('Content-Type: application/vnd.msword');
header('Content-Disposition: attachment; filename="test.docx"');
header('Cache-Control: private, max-age=0, must-revalidate');
?>

<head>

<style type="text/css">
    .lst-kix_list_4-1>li{
        counter-increment:lst-ctn-kix_list_4-1
    }
    ol.lst-kix_list_3-1{
        list-style-type:none
    }
    ol.lst-kix_list_3-2{
        list-style-type:none;
    }
    .lst-kix_list_3-1>li{
        counter-increment:lst-ctn-kix_list_3-1
    }
    ol.lst-kix_list_3-3{
        list-style-type:none
    }
    ol.lst-kix_list_3-4.start{
        counter-reset:lst-ctn-kix_list_3-4 0
    }
    ol.lst-kix_list_3-4{
        list-style-type:none
    }
    ol.lst-kix_list_3-0{
        list-style-type:none;
    }
    .lst-kix_list_1-1>li{
        counter-increment:lst-ctn-kix_list_1-1;
    }
    .lst-kix_list_3-0>li:before{
        content:" "
    }
    ol.lst-kix_list_3-1.start{
        counter-reset:lst-ctn-kix_list_3-1 0;
    }
    .lst-kix_list_3-1>li:before{
        content:" ";
    }
    .lst-kix_list_3-2>li:before{
        content:" "
    }
    ol.lst-kix_list_1-8.start{
        counter-reset:lst-ctn-kix_list_1-8 0;
    }
    .lst-kix_list_4-0>li{
        counter-increment:lst-ctn-kix_list_4-0;
    }
    .lst-kix_list_3-5>li:before{
        content:" ";
    }
    .lst-kix_list_3-4>li:before{
        content:" "
    }
    ol.lst-kix_list_1-5.start{
        counter-reset:lst-ctn-kix_list_1-5 0;
    }
    .lst-kix_list_3-3>li:before{
        content:" "
    }
    ol.lst-kix_list_3-5{
        list-style-type:none
    }
    ol.lst-kix_list_3-6{
        list-style-type:none
    }
    ol.lst-kix_list_3-7{
        list-style-type:none
    }
    ol.lst-kix_list_3-8{
        list-style-type:none;
    }
    .lst-kix_list_3-8>li:before{
        content:" ";
    }
    .lst-kix_list_3-6>li:before{
        content:" ";
    }
    .lst-kix_list_4-3>li{
        counter-increment:lst-ctn-kix_list_4-3;
    }
    .lst-kix_list_3-7>li:before{
        content:" "
    }
    ol.lst-kix_list_4-5.start{
        counter-reset:lst-ctn-kix_list_4-5 0;
    }
    .lst-kix_list_1-2>li{
        counter-increment:lst-ctn-kix_list_1-2
    }
    ol.lst-kix_list_3-7.start{
        counter-reset:lst-ctn-kix_list_3-7 0
    }
    ol.lst-kix_list_4-2.start{
        counter-reset:lst-ctn-kix_list_4-2 0;
    }
    .lst-kix_list_3-2>li{
        counter-increment:lst-ctn-kix_list_3-2;
    }
    .lst-kix_list_1-4>li{
        counter-increment:lst-ctn-kix_list_1-4;
    }
    .lst-kix_list_4-4>li{
        counter-increment:lst-ctn-kix_list_4-4
    }
    ol.lst-kix_list_1-6.start{
        counter-reset:lst-ctn-kix_list_1-6 0;
    }
    .lst-kix_list_4-8>li:before{
        content:"" counter(lst-ctn-kix_list_4-0,decimal) "." counter(lst-ctn-kix_list_4-1,decimal) "." counter(lst-ctn-kix_list_4-2,decimal) "." counter(lst-ctn-kix_list_4-3,decimal) "." counter(lst-ctn-kix_list_4-4,decimal) "." counter(lst-ctn-kix_list_4-5,decimal) "." counter(lst-ctn-kix_list_4-6,decimal) "." counter(lst-ctn-kix_list_4-7,decimal) "." counter(lst-ctn-kix_list_4-8,decimal) ". ";
    }
    .lst-kix_list_4-7>li:before{
        content:"" counter(lst-ctn-kix_list_4-0,decimal) "." counter(lst-ctn-kix_list_4-1,decimal) "." counter(lst-ctn-kix_list_4-2,decimal) "." counter(lst-ctn-kix_list_4-3,decimal) "." counter(lst-ctn-kix_list_4-4,decimal) "." counter(lst-ctn-kix_list_4-5,decimal) "." counter(lst-ctn-kix_list_4-6,decimal) "." counter(lst-ctn-kix_list_4-7,decimal) ". "
    }
    ol.lst-kix_list_4-1.start{
        counter-reset:lst-ctn-kix_list_4-1 1
    }
    ol.lst-kix_list_4-8.start{
        counter-reset:lst-ctn-kix_list_4-8 0
    }
    ol.lst-kix_list_3-3.start{
        counter-reset:lst-ctn-kix_list_3-3 0
    }
    ol.lst-kix_list_1-0.start{
        counter-reset:lst-ctn-kix_list_1-0 0;
    }
    .lst-kix_list_3-0>li{
        counter-increment:lst-ctn-kix_list_3-0;
    }
    .lst-kix_list_3-3>li{
        counter-increment:lst-ctn-kix_list_3-3
    }
    ol.lst-kix_list_4-0.start{
        counter-reset:lst-ctn-kix_list_4-0 2;
    }
    .lst-kix_list_3-6>li{
        counter-increment:lst-ctn-kix_list_3-6
    }
    ol.lst-kix_list_3-2.start{
        counter-reset:lst-ctn-kix_list_3-2 0
    }
    ol.lst-kix_list_4-7.start{
        counter-reset:lst-ctn-kix_list_4-7 0
    }
    ol.lst-kix_list_1-3{
        list-style-type:none
    }
    ol.lst-kix_list_1-4{
        list-style-type:none;
    }
    .lst-kix_list_2-6>li:before{
        content:"\0025cf ";
    }
    .lst-kix_list_2-7>li:before{
        content:"o ";
    }
    .lst-kix_list_3-7>li{
        counter-increment:lst-ctn-kix_list_3-7
    }
    ol.lst-kix_list_1-5{
        list-style-type:none
    }
    ol.lst-kix_list_1-6{
        list-style-type:none
    }
    ol.lst-kix_list_1-0{
        list-style-type:none;
    }
    .lst-kix_list_2-4>li:before{
        content:"o ";
    }
    .lst-kix_list_2-5>li:before{
        content:"\0025aa ";
    }
    .lst-kix_list_2-8>li:before{
        content:"\0025aa "
    }
    ol.lst-kix_list_1-1{
        list-style-type:none
    }
    ol.lst-kix_list_1-2{
        list-style-type:none
    }
    ol.lst-kix_list_4-6.start{
        counter-reset:lst-ctn-kix_list_4-6 0
    }
    ol.lst-kix_list_3-0.start{
        counter-reset:lst-ctn-kix_list_3-0 0
    }
    ol.lst-kix_list_4-3.start{
        counter-reset:lst-ctn-kix_list_4-3 0
    }
    ol.lst-kix_list_1-7{
        list-style-type:none;
    }
    .lst-kix_list_4-7>li{
        counter-increment:lst-ctn-kix_list_4-7;
    }
    .lst-kix_list_1-7>li{
        counter-increment:lst-ctn-kix_list_1-7
    }
    ol.lst-kix_list_1-8{
        list-style-type:none
    }
    ol.lst-kix_list_3-8.start{
        counter-reset:lst-ctn-kix_list_3-8 0;
    }
    .lst-kix_list_4-0>li:before{
        content:"" counter(lst-ctn-kix_list_4-0,decimal) ". ";
    }
    .lst-kix_list_3-8>li{
        counter-increment:lst-ctn-kix_list_3-8;
    }
    .lst-kix_list_4-1>li:before{
        content:"" counter(lst-ctn-kix_list_4-0,decimal) "." counter(lst-ctn-kix_list_4-1,decimal) ". ";
    }
    .lst-kix_list_4-6>li{
        counter-increment:lst-ctn-kix_list_4-6
    }
    ol.lst-kix_list_1-7.start{
        counter-reset:lst-ctn-kix_list_1-7 0;
    }
    .lst-kix_list_4-4>li:before{
        content:"" counter(lst-ctn-kix_list_4-0,decimal) "." counter(lst-ctn-kix_list_4-1,decimal) "." counter(lst-ctn-kix_list_4-2,decimal) "." counter(lst-ctn-kix_list_4-3,decimal) "." counter(lst-ctn-kix_list_4-4,decimal) ". ";
    }
    .lst-kix_list_1-5>li{
        counter-increment:lst-ctn-kix_list_1-5;
    }
    .lst-kix_list_4-3>li:before{
        content:"" counter(lst-ctn-kix_list_4-0,decimal) "." counter(lst-ctn-kix_list_4-1,decimal) "." counter(lst-ctn-kix_list_4-2,decimal) "." counter(lst-ctn-kix_list_4-3,decimal) ". ";
    }
    .lst-kix_list_4-5>li:before{
        content:"" counter(lst-ctn-kix_list_4-0,decimal) "." counter(lst-ctn-kix_list_4-1,decimal) "." counter(lst-ctn-kix_list_4-2,decimal) "." counter(lst-ctn-kix_list_4-3,decimal) "." counter(lst-ctn-kix_list_4-4,decimal) "." counter(lst-ctn-kix_list_4-5,decimal) ". ";
    }
    .lst-kix_list_4-2>li:before{
        content:"" counter(lst-ctn-kix_list_4-0,decimal) "." counter(lst-ctn-kix_list_4-1,decimal) "." counter(lst-ctn-kix_list_4-2,decimal) ". ";
    }
    .lst-kix_list_4-6>li:before{
        content:"" counter(lst-ctn-kix_list_4-0,decimal) "." counter(lst-ctn-kix_list_4-1,decimal) "." counter(lst-ctn-kix_list_4-2,decimal) "." counter(lst-ctn-kix_list_4-3,decimal) "." counter(lst-ctn-kix_list_4-4,decimal) "." counter(lst-ctn-kix_list_4-5,decimal) "." counter(lst-ctn-kix_list_4-6,decimal) ". ";
    }
    .lst-kix_list_1-8>li{
        counter-increment:lst-ctn-kix_list_1-8
    }
    ol.lst-kix_list_1-4.start{
        counter-reset:lst-ctn-kix_list_1-4 0;
    }
    .lst-kix_list_3-5>li{
        counter-increment:lst-ctn-kix_list_3-5
    }
    ol.lst-kix_list_1-1.start{
        counter-reset:lst-ctn-kix_list_1-1 0
    }
    ol.lst-kix_list_4-0{
        list-style-type:none;
    }
    .lst-kix_list_3-4>li{
        counter-increment:lst-ctn-kix_list_3-4
    }
    ol.lst-kix_list_4-1{
        list-style-type:none
    }
    ol.lst-kix_list_4-4.start{
        counter-reset:lst-ctn-kix_list_4-4 0
    }
    ol.lst-kix_list_4-2{
        list-style-type:none
    }
    ol.lst-kix_list_4-3{
        list-style-type:none
    }
    ol.lst-kix_list_3-6.start{
        counter-reset:lst-ctn-kix_list_3-6 0
    }
    ol.lst-kix_list_1-3.start{
        counter-reset:lst-ctn-kix_list_1-3 0
    }
    ul.lst-kix_list_2-8{
        list-style-type:none
    }
    ol.lst-kix_list_1-2.start{
        counter-reset:lst-ctn-kix_list_1-2 0
    }
    ol.lst-kix_list_4-8{
        list-style-type:none
    }
    ul.lst-kix_list_2-2{
        list-style-type:none;
    }
    .lst-kix_list_1-0>li:before{
        content:"" counter(lst-ctn-kix_list_1-0,decimal) ". "
    }
    ul.lst-kix_list_2-3{
        list-style-type:none
    }
    ul.lst-kix_list_2-0{
        list-style-type:none
    }
    ul.lst-kix_list_2-1{
        list-style-type:none
    }
    ol.lst-kix_list_4-4{
        list-style-type:none
    }
    ul.lst-kix_list_2-6{
        list-style-type:none
    }
    ol.lst-kix_list_4-5{
        list-style-type:none;
    }
    .lst-kix_list_1-1>li:before{
        content:"" counter(lst-ctn-kix_list_1-0,decimal) "." counter(lst-ctn-kix_list_1-1,decimal) ". ";
    }
    .lst-kix_list_1-2>li:before{
        content:"" counter(lst-ctn-kix_list_1-0,decimal) "." counter(lst-ctn-kix_list_1-1,decimal) "." counter(lst-ctn-kix_list_1-2,decimal) ". "
    }
    ul.lst-kix_list_2-7{
        list-style-type:none
    }
    ol.lst-kix_list_4-6{
        list-style-type:none
    }
    ul.lst-kix_list_2-4{
        list-style-type:none
    }
    ol.lst-kix_list_4-7{
        list-style-type:none
    }
    ul.lst-kix_list_2-5{
        list-style-type:none;
    }
    .lst-kix_list_1-3>li:before{
        content:"" counter(lst-ctn-kix_list_1-0,decimal) "." counter(lst-ctn-kix_list_1-1,decimal) "." counter(lst-ctn-kix_list_1-2,decimal) "." counter(lst-ctn-kix_list_1-3,decimal) ". ";
    }
    .lst-kix_list_1-4>li:before{
        content:"" counter(lst-ctn-kix_list_1-0,decimal) "." counter(lst-ctn-kix_list_1-1,decimal) "." counter(lst-ctn-kix_list_1-2,decimal) "." counter(lst-ctn-kix_list_1-3,decimal) "." counter(lst-ctn-kix_list_1-4,decimal) ". "
    }
    ol.lst-kix_list_3-5.start{
        counter-reset:lst-ctn-kix_list_3-5 0;
    }
    .lst-kix_list_1-0>li{
        counter-increment:lst-ctn-kix_list_1-0;
    }
    .lst-kix_list_4-8>li{
        counter-increment:lst-ctn-kix_list_4-8;
    }
    .lst-kix_list_1-6>li{
        counter-increment:lst-ctn-kix_list_1-6;
    }
    .lst-kix_list_1-7>li:before{
        content:"" counter(lst-ctn-kix_list_1-0,decimal) "." counter(lst-ctn-kix_list_1-1,decimal) "." counter(lst-ctn-kix_list_1-2,decimal) "." counter(lst-ctn-kix_list_1-3,decimal) "." counter(lst-ctn-kix_list_1-4,decimal) "." counter(lst-ctn-kix_list_1-5,decimal) "." counter(lst-ctn-kix_list_1-6,decimal) "." counter(lst-ctn-kix_list_1-7,decimal) ". ";
    }
    .lst-kix_list_1-3>li{
        counter-increment:lst-ctn-kix_list_1-3;
    }
    .lst-kix_list_1-5>li:before{
        content:"" counter(lst-ctn-kix_list_1-0,decimal) "." counter(lst-ctn-kix_list_1-1,decimal) "." counter(lst-ctn-kix_list_1-2,decimal) "." counter(lst-ctn-kix_list_1-3,decimal) "." counter(lst-ctn-kix_list_1-4,decimal) "." counter(lst-ctn-kix_list_1-5,decimal) ". ";
    }
    .lst-kix_list_1-6>li:before{
        content:"" counter(lst-ctn-kix_list_1-0,decimal) "." counter(lst-ctn-kix_list_1-1,decimal) "." counter(lst-ctn-kix_list_1-2,decimal) "." counter(lst-ctn-kix_list_1-3,decimal) "." counter(lst-ctn-kix_list_1-4,decimal) "." counter(lst-ctn-kix_list_1-5,decimal) "." counter(lst-ctn-kix_list_1-6,decimal) ". ";
    }
    .lst-kix_list_2-0>li:before{
        content:"- ";
    }
    .lst-kix_list_2-1>li:before{
        content:"o ";
    }
    .lst-kix_list_4-5>li{
        counter-increment:lst-ctn-kix_list_4-5;
    }
    .lst-kix_list_1-8>li:before{
        content:"" counter(lst-ctn-kix_list_1-0,decimal) "." counter(lst-ctn-kix_list_1-1,decimal) "." counter(lst-ctn-kix_list_1-2,decimal) "." counter(lst-ctn-kix_list_1-3,decimal) "." counter(lst-ctn-kix_list_1-4,decimal) "." counter(lst-ctn-kix_list_1-5,decimal) "." counter(lst-ctn-kix_list_1-6,decimal) "." counter(lst-ctn-kix_list_1-7,decimal) "." counter(lst-ctn-kix_list_1-8,decimal) ". ";
    }
    .lst-kix_list_2-2>li:before{
        content:"\0025aa ";
    }
    .lst-kix_list_2-3>li:before{
        content:"\0025cf ";
    }
    .lst-kix_list_4-2>li{
        counter-increment:lst-ctn-kix_list_4-2
    }
    ol{
        margin:0;
        padding:0
    }
    table td,table th{
        padding:0;
    }
    .c19{
        border-right-style:solid;
        padding:0pt 5.4pt 0pt 5.4pt;
        border-bottom-color:#000000;
        border-top-width:1pt;
        border-right-width:1pt;
        border-left-color:#000000;
        vertical-align:middle;
        border-right-color:#000000;
        border-left-width:1pt;
        border-top-style:solid;
        border-left-style:solid;
        border-bottom-width:1pt;
        width:297.7pt;
        border-top-color:#000000;
        border-bottom-style:solid;
    }
    .c20{
        border-right-style:solid;
        padding:0pt 5.4pt 0pt 5.4pt;
        border-bottom-color:#000000;
        border-top-width:1pt;
        border-right-width:1pt;
        border-left-color:#000000;
        vertical-align:middle;
        border-right-color:#000000;
        border-left-width:1pt;
        border-top-style:solid;
        border-left-style:solid;
        border-bottom-width:1pt;
        width:219.8pt;
        border-top-color:#000000;
        border-bottom-style:solid;
    }
    .c34{
        border-right-style:solid;
        padding:0pt 5.4pt 0pt 5.4pt;
        border-bottom-color:#000000;
        border-top-width:0pt;
        border-right-width:0pt;
        border-left-color:#000000;
        vertical-align:top;
        border-right-color:#000000;
        border-left-width:0pt;
        border-top-style:solid;
        border-left-style:solid;
        border-bottom-width:0pt;
        width:233.6pt;
        border-top-color:#000000;
        border-bottom-style:solid;
    }
    .c61{
        border-right-style:solid;
        padding:0pt 5.4pt 0pt 5.4pt;
        border-bottom-color:#000000;
        border-top-width:0pt;
        border-right-width:0pt;
        border-left-color:#000000;
        vertical-align:top;
        border-right-color:#000000;
        border-left-width:0pt;
        border-top-style:solid;
        border-left-style:solid;
        border-bottom-width:0pt;
        width:226.8pt;
        border-top-color:#000000;
        border-bottom-style:solid;
    }
    .c59{
        border-right-style:solid;
        padding:0pt 5.4pt 0pt 5.4pt;
        border-bottom-color:#000000;
        border-top-width:0pt;
        border-right-width:0pt;
        border-left-color:#000000;
        vertical-align:top;
        border-right-color:#000000;
        border-left-width:0pt;
        border-top-style:solid;
        border-left-style:solid;
        border-bottom-width:0pt;
        width:205.6pt;
        border-top-color:#000000;
        border-bottom-style:solid;
    }
    .c16{
        border-right-style:solid;
        padding:0pt 5.4pt 0pt 5.4pt;
        border-bottom-color:#000000;
        border-top-width:1pt;
        border-right-width:1pt;
        border-left-color:#000000;
        vertical-align:middle;
        border-right-color:#000000;
        border-left-width:1pt;
        border-top-style:solid;
        border-left-style:solid;
        border-bottom-width:1pt;
        width:163.1pt;
        border-top-color:#000000;
        border-bottom-style:solid;
    }
    .c44{
        border-right-style:solid;
        padding:0pt 5.4pt 0pt 5.4pt;
        border-bottom-color:#000000;
        border-top-width:0pt;
        border-right-width:0pt;
        border-left-color:#000000;
        vertical-align:top;
        border-right-color:#000000;
        border-left-width:0pt;
        border-top-style:solid;
        border-left-style:solid;
        border-bottom-width:0pt;
        width:233.7pt;
        border-top-color:#000000;
        border-bottom-style:solid;
    }
    .c17{
        border-right-style:solid;
        padding:0pt 5.4pt 0pt 5.4pt;
        border-bottom-color:#000000;
        border-top-width:1pt;
        border-right-width:1pt;
        border-left-color:#000000;
        vertical-align:top;
        border-right-color:#000000;
        border-left-width:1pt;
        border-top-style:solid;
        border-left-style:solid;
        border-bottom-width:1pt;
        width:163.1pt;
        border-top-color:#000000;
        border-bottom-style:solid;
    }
    .c2{
        border-right-style:solid;
        padding:0pt 5.4pt 0pt 5.4pt;
        border-bottom-color:#000000;
        border-top-width:1pt;
        border-right-width:1pt;
        border-left-color:#000000;
        vertical-align:middle;
        border-right-color:#000000;
        border-left-width:1pt;
        border-top-style:solid;
        border-left-style:solid;
        border-bottom-width:1pt;
        width:78pt;
        border-top-color:#000000;
        border-bottom-style:solid;
    }
    .c4{
        color:#ff0000;
        font-weight:700;
        text-decoration:none;
        vertical-align:baseline;
        font-size:10.5pt;
        font-family:"Times New Roman";
        font-style:normal;
    }
    .c0{
        padding-top:0pt;
        text-indent:21.3pt;
        padding-bottom:0pt;
        line-height:0.8;
        orphans:2;
        widows:2;
        text-align:justify;
    }
    .c5{
        color:#000000;
        font-weight:400;
        text-decoration:none;
        vertical-align:baseline;
        font-size:13pt;
        font-family:"Times New Roman";
        font-style:normal;
    }
    .c1{
        color:#000000;
        font-weight:700;
        text-decoration:none;
        vertical-align:baseline;
        font-size:13pt;
        font-family:"Times New Roman";
        font-style:normal;
    }
    .c7{
        padding-top:0pt;
        text-indent:21.3pt;
        padding-bottom:0pt;
        line-height:0.8;
        orphans:2;
        widows:2;
        text-align:left;
    }
    .c6{
        padding-top:0pt;
        padding-bottom:0pt;
        line-height:0.8;
        orphans:2;
        widows:2;
        text-align:left;
        height:11pt;
    }
    .c25{
        padding-top:0pt;
        padding-bottom:0pt;
        line-height:1.1500000000000001;
        orphans:2;
        widows:2;
        text-align:justify;
        height:11pt;
    }
    .c29{
        padding-top:0pt;
        padding-bottom:8pt;
        line-height:1.0791666666666666;
        orphans:2;
        widows:2;
        text-align:center;
        height:11pt;
    }
    .c45{
        color:#000000;
        font-weight:400;
        text-decoration:none;
        vertical-align:baseline;
        font-size:11pt;
        font-family:"Calibri";
    }
    .c55{
        padding-top:0pt;
        padding-bottom:0pt;
        line-height:0.8;
        orphans:2;
        widows:2;
        text-align:justify;
    }
    .c50{
        color:#000000;
        font-weight:700;
        text-decoration:none;
        vertical-align:baseline;
        font-size:12pt;
        font-family:"Times New Roman";
    }
    .c32{
        padding-top:0pt;
        padding-bottom:8pt;
        line-height:1.0791666666666666;
        orphans:2;
        widows:2;
        text-align:left;
    }
    .c36{
        padding-top:0pt;
        padding-bottom:8pt;
        line-height:1.0791666666666666;
        orphans:2;
        widows:2;
        text-align:center;
    }
    .c57{
        padding-top:0pt;
        padding-bottom:0pt;
        line-height:1.0791666666666666;
        orphans:2;
        widows:2;
        text-align:center;
    }
    .c15{
        padding-top:0pt;
        padding-bottom:0pt;
        line-height:1.1500000000000001;
        orphans:2;
        widows:2;
        text-align:center;
        font-weight: bold;
    }
    .c21{
        color:#000000;
        font-weight:700;
        text-decoration:none;
        vertical-align:baseline;
        font-size:10.5pt;
        font-family:"Times New Roman";
    }
    .c26{
        color:#000000;
        font-weight:400;
        text-decoration:none;
        vertical-align:baseline;
        font-size:12pt;
        font-family:"Times New Roman";
    }
    .c9{
        padding-top:0pt;
        padding-bottom:0pt;
        line-height:0.8;
        orphans:2;
        widows:2;
        text-align:left;
    }
    .c22{
        color:#000000;
        font-weight:700;
        text-decoration:none;
        vertical-align:baseline;
        font-size:10pt;
        font-family:"Times New Roman";
    }
    .c35{
        color:#000000;
        font-weight:400;
        text-decoration:none;
        vertical-align:baseline;
        font-size:10pt;
        font-family:"Times New Roman";
    }
    .c28{
        color:#000000;
        font-weight:700;
        text-decoration:none;
        vertical-align:baseline;
        font-size:9pt;
        font-family:"Times New Roman";
    }
    .c13{
        padding-top:0pt;
        padding-bottom:0pt;
        line-height:0.8;
        orphans:2;
        widows:2;
        text-align:center;
    }
    .c23{
        padding-top:0pt;
        padding-bottom:0pt;
        line-height:1.15;
        text-align:left;
        height:11pt;
    }
    .c47{
        color:#000000;
        text-decoration:none;
        vertical-align:baseline;
        font-style:italic;
    }
    .c3{
        margin-left:20.2pt;
        border-spacing:0;
        border-collapse:collapse;
        margin-right:auto;
    }
    .c14{
        color:#ff0000;
        text-decoration:none;
        vertical-align:baseline;
        font-style:normal;
    }
    .c63{
        margin-left:9.8pt;
        border-spacing:0;
        border-collapse:collapse;
        margin-right:auto;
    }
    .c68{
        margin-left:35.2pt;
        border-spacing:0;
        border-collapse:collapse;
        margin-right:auto;
        width: 100%;
        padding: 5px;
    }
    .c31{
        font-size:12pt;
        font-family:"Times New Roman";
        font-style:italic;
        font-weight:400;
    }
    .c43{
        font-size:12pt;
        font-family:"Times New Roman";
        font-weight:400;
    }
    .c60{
        font-size:10.5pt;
        font-family:"Times New Roman";
        font-weight:700;
    }
    .c42{
        font-size:13pt;
        font-family:"Calibri";
        font-weight:400;
    }
    .c54{
        color:#000000;
        text-decoration:none;
        vertical-align:baseline;
    }
    .c39{
        font-size:10pt;
        font-family:"Times New Roman";
        font-weight:700;
    }
    .c38{
        font-weight:700;
        font-size:11pt;
        font-family:"Times New Roman";
    }
    .c37{
        font-size:9pt;
        font-family:"Times New Roman";
        font-weight:700;
    }
    .c10{
        font-size:13pt;
        font-family:"Times New Roman";
        font-weight:700;
    }
    .c12{
        font-size:13pt;
        font-family:"Times New Roman";
        font-weight:400;
    }
    .c27{
        font-weight:400;
        font-size:14pt;
        font-family:"Times New Roman";
    }
    .c46{
        font-family:"Calibri";
        font-weight:400;
    }
    .c58{
        font-family:"Times New Roman";
        font-weight:400;
    }
    .c67{
        max-width:507.4pt;
        padding:36.9pt 34pt 21.2pt 53.9pt;
    }
    .c24{
        padding:0;
        margin:0;
    }
    .c48{
        margin-left:276.4pt;
        text-indent:0.3pt;
    }
    .c62{
        margin-left:276.4pt;
        margin-right:-9.9pt;
    }
    .c41{
        margin-left:0pt;
        list-style-position:inside;
    }
    .c65{
        font-weight:700;
        font-family:"Times New Roman";
    }
    .c69{
        height:23.3pt;
    }
    .c66{
        margin-left:42.5pt;
    }
    .c49{
        height:12.2pt;
    }
    .c30{
        height:11pt;
    }
    .c40{
        text-indent:21.3pt;
    }
    .c8{
        background-color:#ffffff;
    }
    .c51{
        height:3.3pt;
    }
    .c52{
        margin-left:21.3pt;
    }
    .c71{
        font-size:12pt;
    }
    .c70{
        height:28.6pt;
    }
    .c11{
        height:0pt;
    }
    .c53{
        height:18.2pt;
    }
    .c56{
        font-size:10pt;
    }
    .c64{
        height:21.1pt;
    }
    .c18{
        font-style:normal;
    }
    .c33{
        color:#ff0000;
    }
    .title{
        padding-top:0pt;
        color:#2e75b5;
        font-size:26pt;
        padding-bottom:0pt;
        font-family:"Calibri";
        line-height:0.8;
        orphans:2;
        widows:2;
        text-align:left;
    }
    .subtitle{
        padding-top:0pt;
        color:#000000;
        font-size:11pt;
        padding-bottom:8pt;
        font-family:"Calibri";
        line-height:0.8;
        orphans:2;
        widows:2;
        text-align:left
    }
    li{
        color:#000000;
        font-size:11pt;
        font-family:"Calibri"
    }
    p{
        margin:0;
        color:#000000;
        font-size:11pt;
        font-family:"Calibri"
    }
    h1{
        padding-top:16pt;
        color:#2e75b5;
        font-size:15pt;
        padding-bottom:0pt;
        font-family:"Calibri";
        line-height:0.8;
        page-break-after:avoid;
        orphans:2;
        widows:2;
        text-align:left
    }
    h2{
        padding-top:2pt;
        color:#c55911;
        font-size:14pt;
        padding-bottom:0pt;
        font-family:"Calibri";
        line-height:0.8;
        page-break-after:avoid;
        orphans:2;
        widows:2;
        text-align:left
    }
    h3{
        padding-top:2pt;
        color:#538135;
        font-size:13pt;
        padding-bottom:0pt;
        font-family:"Calibri";
        line-height:0.8;
        page-break-after:avoid;
        orphans:2;
        widows:2;
        text-align:left
    }
    h4{
        padding-top:2pt;
        color:#2f5496;
        font-size:12.5pt;
        padding-bottom:0pt;
        font-family:"Calibri";
        line-height:1.0791666666666666;
        page-break-after:avoid;
        font-style:italic;
        orphans:2;
        widows:2;
        text-align:left
    }
    h5{
        padding-top:2pt;
        color:#843c0b;
        font-size:12pt;
        padding-bottom:0pt;
        font-family:"Calibri";
        line-height:1.0791666666666666;
        page-break-after:avoid;
        font-style:italic;
        orphans:2;
        widows:2;
        text-align:left
    }
    h6{
        padding-top:2pt;
        color:#385623;
        font-size:11.5pt;
        padding-bottom:0pt;
        font-family:"Calibri";
        line-height:1.0791666666666666;
        page-break-after:avoid;
        font-style:italic;
        orphans:2;
        widows:2;
        text-align:left
    }
</style>
</head>
<body class="c8 c67 doc-content">
   <p class="c13" id="h.gjdgxs"><span class="c10"><b>ШAРТНОМA</b></span><span class="c12">&nbsp;</span><span class="c65 c71"><b>№ </b></span><span class="c33 c42"><?php echo e($data['contract_number']); ?></span></p>
   <p class="c13"><span class="c5">Улуш киритиш асосида турар-жой биноси қурилишида иштирок этиш тўғрисида</span></p>
   <p class="c6"><span class="c5"></span></p>
   <p class="c9"><span class="c10 c33"><b><?php echo e(date('Y',strtotime($data['date_deal']))); ?> йил <?php echo e(date('d',strtotime($data['date_deal']))); ?> <?php echo e($month_name); ?></b></span><span class="c10">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Тошкент шаҳри</span></p>
   <p class="c6"><span class="c5"></span></p>
   <p class="c0"><span class="c12 c33">“<?php echo e($data['company_name']); ?>” МЧЖ</span><span class="c10 c33">&nbsp;</span><span class="c12 c18">директори </span><span class="c12 c33"><?php echo e($data['company_director']); ?></span><span class="c43 c18 c33">&nbsp;</span><span class="c12 c18"> (кейинги ўринларда “Қурувчи” деб юритилади) бир томондан, фуқаро </span><span class="c10 c18 c33"><b><?php echo e($data['last_name']); ?> <?php echo e($data['first_name']); ?> <?php echo e($data['middle_name']); ?></b></span><span class="c10 c18">&nbsp;</span><span class="c5"> (кейинги ўринларда “Улушдор” деб юритилади) иккинчи томондан ушбу шартномани қуйидагилар ҳақида туздик.</span></p>
   <p class="c0 c30"><span class="c5"></span></p>
   <p class="c13 c52"><span class="c10 c18"><b>1.</b>&nbsp;<b>АСОСИЙ ТУШУНЧАЛАР</b><br>
   </span>
   <span class="c0"><span class="c5">1.1.&nbsp;Шартномада қуйидаги асосий атамалар ва тушунчалар қўлланилади:</span></span></p>
   <p class="c0"><span class="c1"><b>улушдор</b></span><span class="c5">&nbsp;</span><span class="c1">–</span><span class="c5">&nbsp;қурилиш мажмуасида бир ёки бир нечта қурилиш объектини мулк ҳуқуқи билан олиш мақсадида улуш киритиш асосида қурилишда иштирок этиш тўғрисида шартнома тузган жисмоний ёки юридик шахс;</span></p>
   <p class="c0"><span class="c10 c18"><b>улуш киритиш асосида қурилиш</b></span><span class="c12 c18">&nbsp;</span><span class="c10 c18">–</span><span class="c5">&nbsp;кўп квартирали уйларни қурувчилар ва улушдорларнинг маблағлари ҳисобидан қуриш, реконструкция қилиш ва қайта ихтисослаштириш; </span></p>
   <p class="c0"><span class="c10 c18"><b>улуш киритиш асосида қурилишда иштирок этиш тўғрисидаги шартнома</b></span><span class="c12 c18">&nbsp;</span><span class="c10 c18">–</span><span class="c5">&nbsp;кўп квартирали уйларни улуш киритиш асосида қуриш бўйича қурувчи ва улушдор ўртасидаги муносабатларни тартибга солувчи ёзма шаклдаги битим;</span></p>
   <p class="c0"><span class="c10 c18"><b>қурувчи (девелопер)</b></span><span class="c12 c18">&nbsp;</span><span class="c10 c18">–</span><span class="c5">&nbsp;улуш киритиш асосида қуриш учун маблағларни жалб этувчи қурувчиларнинг электрон рўйхатига киритилган, кўп квартирали уйларни қуришга мўлжалланган ер участкасига ва қурилиш ишларини амалга оширишга бирламчи рухсат берувчи ҳужжатларга эга бўлган юридик шахс;</span></p>
   <p class="c0"><span class="c10 c18"><b>қурилиш мажмуаси</b></span><span class="c12 c18">&nbsp;</span><span class="c10 c18">–</span><span class="c12 c18">&nbsp;қурувчи томонидан бир лойиҳа доирасида қурилишга ажратилган ер участкасида, бир манзилда қурилаётган бир ёки </span><span class="c5">бир нечта қурилиш объектлари йиғиндиси;</span></p>
   <p class="c0"><span class="c10 c18"><b>қурилиш мажмуасининг қиймати</b></span><span class="c12 c18">&nbsp;</span><span class="c10 c18">–</span><span class="c12 c18">&nbsp;қурувчининг қурилишолди харажатлари, жумладан кўп квартирали уйларни қуриш учун ер участкасини олиш (аукцион савдолари еки хусусий мулкдорларга компенсация тўловини амалга оширган холда ва қонунчилик ҳужжатларида белгиланган бошқа асосларда), рухсат берувчи ҳужжатларни расмийлаштириш ҳамда қуриш ва фойдаланишга топшириш босқичларини якунлаш босқичларини якунлаш учун лойиҳа-смета ҳужжатларида кўзда тутилган харажатлар йиғиндиси;</span></p>
   <p class="c0"><span class="c10 c18"><b>қурилиш объекти</b></span><span class="c12 c18">&nbsp;</span><span class="c10 c18">–</span><span class="c12 c18">&nbsp;шартномага асосан улушдорга топшириладиган хонадон (квартира) ёки бошқа объект;</span></p>
   <p class="c0"><span class="c10 c18">қурилиш объектининг қиймати</span><span class="c12 c18">&nbsp;</span><span class="c10 c18">–</span><span class="c12 c18">&nbsp;шартномада кўрсатилган қурилиш объектининг нархи;</span></p>
   <p class="c0"><span class="c10 c18"><b>улуш депозити</b></span><span class="c12 c18">&nbsp;</span><span class="c10 c18">–</span><span class="c12 c18">&nbsp;улушдор томонидан қурувчининг банкдаги хисоб рақамига қўйилган маблағлар.</span></p>
   <p class="c13 c40"><span class="c1"><b>2.</b>&nbsp;<b>ШАРТНОМА ПРЕДМЕТИ</b></span></p>
   <p class="c0"><span class="c5">2.1.&nbsp;Улушдор қурилиш мажмуаси жойлашган манзил, яъни <?php echo e($data['company_address']); ?> “</span><span class="c1"><b><?php echo e($data['company_name']); ?></b>”</span><span class="c5">&nbsp;турар-жой мажмуаси қурилиши учун улуш киритиш, шу мақсадда шартноманинг 2.2-бандида кўрсатилган хонадоннинг ҳар бир квадрат метрини </span><span class="c14 c10"><b><?php echo e(number_format($data['price_sell_m2'],0,',',' ')); ?></b> <b>(<?php echo e($data['price_sell_m2_words']); ?>)</b></span><span class="c14 c12">&nbsp;</span><span class="c5">сўмдан, умумий қийматини </span><span class="c14 c10"><b><?php echo e(number_format($data['price_sell'],0,',',' ')); ?></b> <b>(<?php echo e($data['price_sell_word']); ?>)</b></span><span class="c14 c12">&nbsp;</span><span class="c5">сўмга сотиб олишга келишиб, ушбу шартнома ва унинг иловасида кўрсатилган шартлар ва муддатда улушларни киритиш, Қурувчи эса, ушбу хонадонни Улушдорга мулк қилиб бериш мажбуриятини олади.</span></p>
   <p class="c0"><span class="c5">2.2.&nbsp;Мулк хусусиятлари: уй ва хонадон (квартира) рақами, яшаш ва ёрдамчи хоналари сони, умумий майдони ва умумий миқдори қуйида келтирилган: </span><span class="c14 c10"><b><?php echo e($data['house_number']); ?>-уй, <?php echo e($data['entrance']); ?>-подъезд, <?php echo e($data['floor']); ?>-қават, <?php echo e($data['number_of_flat']); ?>-хонадон.</b></span></p>
   <p class="c0"><span class="c5">2.2.1.&nbsp;Хонадон (квартира)нинг умумий майдони: </span><span class="c14 c10"><b><?php echo e($data['total_m2']); ?></b> </span><span class="c5">метр</span><span class="c5 c8">&nbsp;</span><span class="c5">квадратни</span><span class="c5 c8">&nbsp;</span><span class="c5">ташкил</span><span class="c5 c8">&nbsp;</span><span class="c5">этади;</span></p>
   <p class="c0"><span class="c5">2.2.2.&nbsp;Яшаш</span><span class="c5 c8">&nbsp;</span><span class="c5">хоналарининг</span><span class="c5 c8">&nbsp;</span><span class="c5">умумий</span><span class="c5 c8">&nbsp;</span><span class="c5">сони </span><span class="c14 c10"><b><?php echo e($data['room_count']); ?></b></span><span class="c5">&nbsp;тани ташкил этади; </span></p>
   <p class="c0"><span class="c5 c8">2.2.3.&nbsp;</span><span class="c5">Яшаш</span><span class="c5 c8">&nbsp;</span><span class="c5">хоналарининг</span><span class="c5 c8">&nbsp;</span><span class="c5">умумий</span><span class="c5 c8">&nbsp;</span><span class="c5">майдони</span><span class="c14 c12">&nbsp;</span><span class="c14 c10"><b><?php echo e($data['live_m2']); ?></b></span><span class="c14 c12">&nbsp;</span><span class="c5">метр</span><span class="c5 c8">&nbsp;</span><span class="c5">квадратни ташкил этади;</span></p>
   <p class="c0"><span class="c5">2.2.4.</span><span class="c5 c8">&nbsp;</span><span class="c5">Ошхонанинг</span><span class="c5 c8">&nbsp;</span><span class="c5">умумий</span><span class="c5 c8">&nbsp;</span><span class="c5">майдони </span><span class="c14 c10"><b><?php echo e($data['kitchen_m2']); ?></b> </span><span class="c5">метр</span><span class="c5 c8">&nbsp;</span><span class="c5">квадратни ташкил</span><span class="c5 c8">&nbsp;</span><span class="c5">этади;</span></p>
   <p class="c0"><span class="c5">2.2.5.&nbsp;Ёрдамчи хона (дахлиз)</span><span class="c5 c8">лар </span><span class="c5">умумий майдони </span><span class="c14 c10"><b>
       <?php
            echo $data['total_m2']-($data['live_m2']+$data['kitchen_m2']);
       ?>
   </b> </span><span class="c5">метр квадратни ташкил</span><span class="c5 c8">&nbsp;</span><span class="c5">этади.</span></p>
   <p class="c0"><span class="c5">2.3.&nbsp;Қурувчи Улушдор билан тузилган мазкур шартномани сармоя маблағлари билан улушли қурилишда қатнашиш доирасида тузилган шартномалар реестрига киритиб рўйхатга олингандан сўнг, Улушдор киритиладиган улушларни мазкур шартноманинг <br></span><span class="c1"><b>1-иловаси</b></span><span class="c5">га кўра тўлов жадвалида кўрсатилган миқдорда ва муддатда Қурувчининг ҳисоб рақамига ўтказиш орқали тақдим этади. Улушларни тақдим этиш тарафларнинг келишувига мувофиқ, чегирма билан ёки чегирмасиз, бўлиб-бўлиб тўлаш тартибида амалга оширилади.</span></p>
   <p class="c0"><span class="c5">2.4.&nbsp;Улушдор ушбу шартноманинг 2.3-бандига кўра, бўлиб-бўлиб тўлаш шарти бўйича улушни тақдим этади, улуш сифатида тўланиши лозим бўлган дастлабки тўлов тарзидаги </span><span class="c14 c10"><b>
    
    <?php if(empty($data['initial_fee'])): ?>
        <?php
            if(!empty($has_pay_status)){
                echo number_format($data['price_sell']/count($has_pay_status),0,',',' ');
            }
            else{
                if ($discount > 0) {
                    echo number_format($data['price_sell']-(($data['price_sell']/100) * $discount),0,',',' ');  
                }
            }

        ?>           
    <?php else: ?>
        <?php
        echo (($data['initial_fee'] > 0) ? number_format(($data['initial_fee']-($data['initial_fee']/100)*$data['initial_fee_discount']),0,',',' ') :' 000 000 000');
            echo "&nbsp;( ".$data['initial_fee_words']." )";

        ?>                          
    <?php endif; ?>
    </b></span><span class="c14 c12">&nbsp;</span><span class="c14 c10"></span><span class="c5">сўм миқдоридаги сармояни </span><span class="c1">3 (уч</span><span class="c5">) кун ичида киритади. Қолган бўлиб-бўлиб тўланиши лозим суммани эса, тўлов жадвалидаги муддатда Қурувчининг ҳисоб рақамига пул кўчириш орқали тўлаб беради.</span></p>
   <p class="c0"><span class="c5">Мазкур сана байрам ёки дам олиш кунига тўғри келган ҳолларда кейинги иш куни тўловларни амалга оширишнинг охирги куни хисобланади.</span></p>
   <p class="c0"><span class="c5">2.5.&nbsp;Улушдорга мулк ҳуқуқи билан топшириладиган объектдаги ишлар таркиби ва ҳажми қуйидаги шартларни ҳисобга олган ҳолда, архитектура-дизайн фирмаси томонидан ишлаб чиқилган лойиҳага мос келиши керак:</span></p>
   <p class="c9 c52"><span class="c5">1)&nbsp;Хонадон&nbsp;ичидаги&nbsp;қурилиш&nbsp;ишлари: тўлиқ битган<br>2)</span><span class="c5 c8">&nbsp;</span><span class="c5">Электр</span><span class="c5 c8">&nbsp;</span><span class="c5">таъминотига</span><span class="c5 c8">&nbsp;</span><span class="c5">оид</span><span class="c5 c8">&nbsp;</span><span class="c5">ишлар: электрлашган <br>3)</span><span class="c5 c8">&nbsp;</span><span class="c5">Табиий</span><span class="c5 c8">&nbsp;</span><span class="c5">газ</span><span class="c5 c8">&nbsp;</span><span class="c5">таъминотига</span><span class="c5 c8">&nbsp;</span><span class="c5">оид</span><span class="c5 c8">&nbsp;</span><span class="c5">ишлар: газлашган</span></p>
   <p class="c9 c52"><span class="c5">4)</span><span class="c18 c45">&nbsp;</span><span class="c5">Иситиш мосламалари урнатилган (котёл, радиатор)<br>5)</span><span class="c5 c8">&nbsp;</span><span class="c5">Сантехника</span><span class="c5 c8">&nbsp;</span><span class="c5">ишлари: тўлиқ бажарилган<br>6)</span><span class="c5 c8">&nbsp;</span><span class="c5">Телефон,</span><span class="c5 c8">&nbsp;</span><span class="c5">интернетга</span><span class="c5 c8">&nbsp;</span><span class="c5">оид</span><span class="c5 c8">&nbsp;</span><span class="c5">ишлар: интернетлашган<br>7)</span><span class="c5 c8">&nbsp;</span><span class="c5">Уйни</span><span class="c5 c8">&nbsp;</span><span class="c5">пардозлаш</span><span class="c5 c8">&nbsp;</span><span class="c5">ишлари: тўлиқ бажарилган<br>8)</span><span class="c5 c8">&nbsp;</span><span class="c5">Бошқа</span><span class="c5 c8">&nbsp;</span><span class="c5">ишлар: келишилмаган.</span></p>
   <p class="c0"><span class="c5">Томонлар лойиҳада кўрсатилмаган ишлар таркиби ва ҳажми, фойдаланиладиган маҳсулотлар, ўрнатиладиган мосламалар, воситалар ва жиҳозлар тури Қурувчи томонидан мустақил ҳал этилишига келишиб олдилар.</span></p>
   <p class="c0"><span class="c5">2.6.&nbsp;Қурилиш объектининг тугалланиши ва Улушдорга топшириш муддати </span><span class="c1"><b>2025 йил III (учинчи) чорак</b></span><span class="c1"></span><span class="c5">&nbsp;деб белгиланган. Қуйидаги ҳолатлар бундан мустасно: </span></p>
   <p class="c0"><span class="c5">қурилиш объектини тугалланиш муддатига енгиб бўлмайдиган куч (форс-мажор) холатлари сабаб бўлса;</span></p>
   <p class="c7"><span class="c5">қурилиш ишлари хажми буюртмачи томонидан ўзгартирилса.</span></p>
   <p class="c0 c30"><span class="c5"></span></p>
   <ol class="c24 lst-kix_list_4-0 start" style="list-style: none;">
      <li class="c13 c40 c41"><span class="c1"><b>3. </b><b>КИРИТИЛАЁТГАН</b></span><span class="c1 c8">&nbsp;</span><span class="c1"><b>УЛУШНИНГ</b></span><span class="c1 c8">&nbsp;</span><span class="c1"><b>ҲАЖМИ,</b></span><span class="c1 c8">&nbsp;</span></li>
   </ol>
   <p class="c13 c40"><span class="c1"><b>ШАКЛИ</b></span><span class="c1 c8">&nbsp;</span><span class="c1"><b>ВА</b></span><span class="c1 c8">&nbsp;</span><span class="c1"><b>ШАРТЛАРИ</b></span></p>
   <p class="c0"><span class="c12">3.1.&nbsp;Улушдор томонидан киритиладиган улушнинг умумий суммаси </span><span class="c10 c18 c33"><b>
        <?php 
            if ($data['initial_fee_discount'] > 0) {
    
                echo number_format($data['price_sell']-(($data['initial_fee']/100)*$data['initial_fee_discount']),0,',',' ');
            }
            else{
                echo number_format($data['price_sell'],0,',',' '); 
            }

        ?>     
        ( <?php echo e($data['price_sell_word']); ?> )
   </b></span><span class="c10 c33">&nbsp;</span><span class="c5">сўмни ташкил этади. Улуш депозитининг белгиланган хажми ўзгартирилиши мумкин эмас. Улуш суммасига Объектга нисбатан Улушдорнинг эгалик ҳуқуқини белгилаш, давлат рўйхатидан ўтказиш билан боғлиқ ҳаражатлар кирмайди.</span></p>
   <p class="c0"><span class="c5">3.2.&nbsp;Қурувчининг розилиги билан улуш ҳиссаси тўлиқ ёки қисман 2.3.-бандларда белгиланган суммага тенг миқдордаги қурилиш материаллари кўринишида ҳам киритилиши ҳам мумкин. Қурилиш материалларининг тури ва миқдори тарафлар томонидан тузиладиган алоҳида келишувга асосан белгиланади.</span></p>
   <p class="c0"><span class="c5">3.3.&nbsp;Улушдор сармоя сифатида қўшган қурилиш материаллари учун барча сифат ва хавфсизлик талабларига жавоб беришига кафолат беради.</span></p>
   <p class="c0"><span class="c5">3.4.&nbsp;Томонларнинг келишувига кўра, ушбу шартноманинг 2.2-бандида кўрсатилган майдон ва унинг таркибий қисмларининг ўлчамлари лойиҳавий (шартли) ҳисобланади. Қурилиш объекти қуриб битказилганидан сўнг якуний ўлчовлар амалга оширилиб, Қурувчи томонидан Улушдорга далолатнома асосида топширилади. Бунда, ортиқча ёки кам чиққан тафовутлар учун ҳисоб-китоб ушбу шартноманинг 2.1-бандида кўрсатилган нархларга мувофиқ амалга оширилади.</span></p>
   <p class="c13 c30 c40"><span class="c1"></span></p>
   <p class="c13 c40"><span class="c10"><b>4.</b></span><span class="c10 c8">&nbsp;</span><span class="c10"><b>ТОМОНЛАРНИНГ</b></span><span class="c10 c8">&nbsp;</span><span class="c10"><b>ҲУҚУҚЛАРИ</b></span><span class="c10 c8">&nbsp;</span><span class="c10"><b>ВА</b></span><span class="c10 c8">&nbsp;</span><span class="c10"><b>МАЖБУРИЯТЛАРИ</b></span></p>
   <p class="c7"><span class="c5">4.1.&nbsp;Қурувчининг мажбуриятлари:</span></p>
   <p class="c0"><span class="c5">4.1.1.&nbsp;Қурувчи Улушдор билан тузилган мазкур шартномани сармоя маблағлари билан «улушли қурилишда қатнашиш доирасида тузилган шартномалар реестри»га киритиб рўйхатга олинишини ва киритиладиган сармоя маблағларини мақсадли фойдаланишини кафолатлайди.</span></p>
   <p class="c0"><span class="c12">4.1.2.</span><span class="c5 c8">&nbsp;Қурувчи ушбу шартномани тузиш вақтида объект ёки улушдорга мулк ҳуқуқи билан ўтказиладиган қисмларнинг бошқа шартномалар предмети эмаслигига, шу жумладан ўзгаларнинг улушли қурилишга сармоя киритиш шартномалари эмаслигини, ишончли бошқарувга топширилмаганлигини, гаровда ёки тақиқда қўйилмаганлигини, учинчи шахсларга ижарага берилмаганлигини, низо предмети ёки учинчи шахсларнинг даъволари билан бошқа мажбуриятларга тааллуқли эмаслигини кафолатлайди.</span></p>
   <p class="c0"><span class="c5 c8">4.1.3.&nbsp;Мажмуа қурилишини ташкил этиш ва амалга ошириш учун барча керакли лойиҳа-смета ва бошқа ҳужжатларни тайёрлаш ва қонунда белгиланган тартибда расмийлаштириш; </span></p>
   <p class="c0"><span class="c5 c8">4.1.4.&nbsp;Қонун талабларидан келиб чиққан ҳолда қурилиш ишлари юзасидан барча зарурий рухсатномаларни ва лицензияларни олиш, учинчи шахслар билан шартномаларни имзолаш, ишларни бажариш; </span></p>
   <p class="c0"><span class="c12">4.1.5.&nbsp;Қурилиш объектини қурилиш</span><span class="c12 c8">&nbsp;</span><span class="c12">ишлари</span><span class="c12 c8">&nbsp;</span><span class="c5">ҳолати билан танишиш имконияти учун шароит яратиш;</span></p>
   <p class="c0"><span class="c5">4.1.6.&nbsp;Улушдорнинг талабига асосан шартнома шартлари бажарилиши бўйича унга ёзма шаклда маълумот бериб бориши;</span></p>
   <p class="c0"><span class="c5">4.1.7.&nbsp;Қурилиш мажмуасини керакли қурилиш материаллари ва техникалар билан таъминлаш, ишчи-хизматчиларни жалб этиш, қурилишни бошқаришни ташкил этиб, уни олиб бориш;</span></p>
   <p class="c0"><span class="c5">4.1.8.&nbsp;Қурилиш мажмуасини қурилиш-монтаж ишлари режасига асосан якунлаш муддатига риоя этиш ва объектни кечиктирмаган ҳолда топшириш;</span></p>
   <p class="c0"><span class="c5">4.1.9.&nbsp;Қурилиш объекти фойдаланишга топширилганидан сўнг, агар Улушдор ушбу шартномада кўрсатилган молиявий мажбуриятларини бажарган бўлса, Қурувчи ёки унинг ваколатли вакили томонидан 30 (ўттиз) кун ичида Улушдорга мулк ҳуқуқи билан ўтказилишида зарур бўлган ҳужжатларни тайёрлаш ва нотариал тартибда расмийлаштириб бериш;</span></p>
   <p class="c0"><span class="c5">4.1.10.&nbsp;Фойдаланишга қабул қилиниб, Улушдорга мулк ҳуқуқи билан давлат рўйхатидан ўтган объектда кафолатланиши кўзда тутилган иш (хизмат) ва материаллар бўйича кафолат муддати давлат комиссияси томонидан қабул қилинган кундан бошлаб <br>12 ойни ташкил этади. Мазкур муддатда аниқланган Қурувчи томонидан бажарилган ишлардаги хато-камчиликларни Қурувчининг ўз томонидан бартараф этиш.</span></p>
   <p class="c7"><span class="c12">4.2.</span><span class="c8 c12">&nbsp;</span><span class="c12">Қурувчининг</span><span class="c12 c8">&nbsp;</span><span class="c5">ҳуқуқлари:</span></p>
   <p class="c0"><span class="c5">4.2.1.&nbsp;Улушдор билан тузилган шартнома тегишли тартибда тузилганидан сўнг, қурилиш объектидаги ишлар учун Улушдорнинг маблағларини жалб қилиш;</span></p>
   <p class="c0"><span class="c5">4.2.2.&nbsp;Улушдордан улушларни тақдим этиш (пул маблағларини киритиш) муддатларига риоя қилинишини талаб қилиш ва ушбу ҳақида алоқа воситалари фойдаланиб, ёзма шаклдаги огоҳлантириш хатларини юбориш;</span></p>
   <p class="c0"><span class="c5">&nbsp;4.2.3.&nbsp;Улушни киритиш қурилиш материаллари кўринишида қўшилганда, Улушдордан ушбу материалларнинг сифат ва хавфсизлик талабларига жавоб беришини билдирувчи тегишли ҳужжатларни талаб қилиш;</span></p>
   <p class="c0"><span class="c5">4.2.4.&nbsp;Қурилиш объектига оид ҳужжатларни расмийлаштириш заруратидан келиб чиққан ҳолда Улушдордан тегишли давлат идораларига келишини талаб қилиш; </span></p>
   <p class="c0"><span class="c5">4.2.5.&nbsp;Қурувчи умумий киритиладиган улуш қийматидан келиб чиқиб, улушдорнинг улуш киритган суммасини инобатга олиб, мустақил тарзда базавий чегирмалар, бир марталик бонусли кэшбек (чегирмалар) таклиф этиш ва тақдим этиш;</span></p>
   <p class="c0"><span class="c5">4.2.6.&nbsp;Улушдорга ўзи киритган улуши доирасида тақдим этилган базавий чегирма ёки бир марталик бонусли кэшбек (чегирма) суммасини шартнома шартларини бузган тақдирда, улушдорни хабардор қилган ҳолда, унинг розилигисиз ҳисобдан чиқариш.</span></p>
   <p class="c0"><span class="c5">4.2.7.&nbsp;Улушдор ушбу шартномада кўрсатилган мажбуриятларини тўлиқ бажармаган тақдирда қурилиш объектини Улушдорга топширишни кечиктириш.</span></p>
   <p class="c0"><span class="c12">4.3.</span><span class="c12 c8">&nbsp;</span><span class="c12">Улушдорнинг</span><span class="c12 c8">&nbsp;</span><span class="c5">мажбуриятлари:</span></p>
   <p class="c0"><span class="c5">4.3.1.&nbsp;Қурувчи билан тузилган шартномага мувофиқ улушларни тақдим этиш (пул маблағларини ўтказиш) муддатларига риоя қилган ҳолда белгиланган муддатларда улушларни Қурувчининг ҳисоб рақамига ўтказиб бориш;</span></p>
   <p class="c0"><span class="c5">4.3.2.&nbsp;Улуш қурилиш материаллари кўринишида қўшилганда, сифат ва хавфсизлик талабларига жавоб берадиган материалларни унинг тегишли зарурий тавсифловчи хужжатлари билан бирга тақдим қилиш;</span></p>
   <p class="c0"><span class="c5">4.3.3.&nbsp;Қурилиш объектига эгалик қилиш учун зарур бўлган ҳужжатлар Қурувчи томонидан тайёрланганда, ҳужжатларни нотариал тартибда расмийлаштиришда иштирок этиш ва расмийлаштиришга оид харажатларни ўз ҳисобидан тўлаш;</span></p>
   <p class="c0"><span class="c5">4.3.4.&nbsp;Қурилиш объектига нисбатан эгалик ҳуқуқи рўйхатдан ўтказилгунга қадар унда қайта қуриш, реконструкция (ўзгартиришлар) қилиш ва қурилиш билан боғлиқ бошқа ишларни амалга оширмаслик;</span></p>
   <p class="c0"><span class="c5">4.3.5.&nbsp;Улушдор мазкур шартномада белгиланган ҳуқуқ ва мажбуриятларини учинчи шахсларга ўтказиш, тақдим этиш ёки бошқа тарзда бериш учун Қурувчининг ёзма шаклдаги розилигини олиши шарт. Ушбу ҳолатда объектни сотиб олиш ва улуш киритишга оид келишувлар ва мажбуриятлар ижроси дастлабки шартнома тузилган пайтдан ҳисобланиши ҳамда Улушдорга тақдим этилган чегирмалар (бонуслар еки кешбеклар) суммаси Қурувчи томонидан қайта ҳисоб-китоб қилиниши тартибига қатъий риоя этиш;</span></p>
   <p class="c0"><span class="c5">4.3.6.&nbsp;Улушдор Қурувчининг объектга бўлган эгалик хуқуқини ўтказишни расмийлаштиришга оид билдиришномасида белгиланган муддатда нотариал тасдиқланган олди-сотди шартномасини тузиши шарт. Бунда белгиланган муддатларга амал қилмаслик ёки мазкур муддат кечиктирилган тақдирда, турар-жой мажмуасидаги коммунал хизматлар ва умумий мулкни сақлаш учун тўловларни қоплаш мажбуриятини бажариш;</span></p>
   <p class="c0"><span class="c5">4.3.7.&nbsp;Мулк ҳуқуқи билан улушдор эгалигига давлат рўйхатидан ўтганлиги тўғрисидаги маълумотни Қурувчига 5 (беш) кун ичида хабар бериши ва кадастр хужжатлари олинганидан кейин 3 (уч) иш куни ичида кадастр ҳужжатлари бир нусхасини Қурувчига ёки унинг ваколатли вакилига такдим этиш;</span></p>
   <p class="c0"><span class="c5">4.3.8.&nbsp;Улушдор қурилиш объектининг тарх қисмига ўзгартириш киритмаслик, қўшимча мосламаларни (кондиционер ва ҳ.к) белгиланган жойларга ўрнатиш;</span></p>
   <p class="c0"><span class="c5">4.3.9.&nbsp;Улушдор қурилиш объектининг асосий юк кўтарувчи деворлари, конструктив қисмларига ўзгартириш киритмаслик;</span></p>
   <p class="c0"><span class="c5">4.3.10.&nbsp;Қурилиш объектини далолатнома асосида қабул қилган пайтдан бошлаб хонадонга эгалик қилиш ва ундан фойдаланиш билан боғлиқ жавобгарлик ва хавфларни зиммасига олиш мажбуриятини олади.</span></p>
   <p class="c7"><span class="c12">4.4.</span><span class="c12 c8">&nbsp;</span><span class="c12">Улушдорнинг</span><span class="c12 c8">&nbsp;</span><span class="c5">ҳуқуқлари:</span></p>
   <p class="c0"><span class="c5">4.4.1.&nbsp;Қурувчидан қурилиш объектида қурилиш ишлари ҳолати билан танишиши учун шароит яратилишини, шартнома шартлари бажарилиши бўйича ёзма шаклда маълумотлар олиш;</span></p>
   <p class="c0"><span class="c5">4.4.2.&nbsp;Қурувчидан қурилиш мажмуасини фойдаланишга топшириш муддатидан кечиктирилмаган ҳолда фойдаланишга топширилишини кўзлаб биргаликда харакат қилиш ва ташаббус кўрсатиш;</span></p>
   <p class="c0"><span class="c5">4.4.3.&nbsp;Қурилиш объекти фойдаланишга топширилганидан кейин Қурувчидан эгалик қилиш учун зарур бўлган ҳужжатлар тайёрланишида ва нотариал тартибда расмийлаштирилишида қатнашиш;</span></p>
   <p class="c0"><span class="c5">4.4.4.&nbsp;Қурувчидан кафолат муддати давомида аниқланган, қурувчи томонидан бажарилган ишлардаги хато ва камчиликларни бартараф этишни кўзлаб, ушбу ишларни далолатнома тузилишида хозир бўлиш;</span></p>
   <p class="c0"><span class="c5">4.4.5.&nbsp;Қурувчи томонидан таклиф этиладиган киритиладиган улуш суммасига мутаносиб бўлган тарздаги базавий чегирмалар, бир марталик бонусли кэшбек (чегирмалар) имтиёзлардан фойдаланиш;</span></p>
   <p class="c0"><span class="c5">4.4.6.&nbsp;Сармоячи қонун хужжатларида белгиланган тартибда ушбу шартномадан келиб чиқадиган хуқуқ ва мажбуриятларни шартноманинг 4.3.5.-бандига шартига кўра, Қурувчининг ёзма розилиги билан учинчи шахсга ўтказиш.</span></p>
   <p class="c13 c30 c40"><span class="c22 c18"></span></p>
   <p class="c13 c40"><span class="c10"><b>5.</b></span><span class="c10 c8">&nbsp;</span><span class="c10"><b>ТОМОНЛАРНИНГ</b></span><span class="c10 c8">&nbsp;</span><span class="c10"><b>ЖАВОБГАРЛИГИ</b></span></p>
   <p class="c0"><span class="c5">5.1.&nbsp;Қурувчи мазкур шартномага асосан зиммасига олаётган мажбуриятларни бажармаса ёки лозим даражада бажармаса ҳар бир кун учун мажбурият бажарилмаган қисмининг 0,05 фоизи миқдорида пеня тўлайди. Бироқ пенянинг умумий миқдори мажбуриятнинг бажарилмаган қисми қийматининг Қурувчи мажбуриятларини бажармаганлиги ёки лозим даражада бажармаганлиги учун унга белгиланадиган пенянинг умумий миқдори шартнома суммасининг 5 (беш) фоизидан ошмаслиги лозим.</span></p>
   <p class="c0"><span class="c5">5.2.&nbsp;Улушдор мазкур шартномага асосан зиммасига олаётган мажбуриятларни бажармаса ёки лозим даражада бажармаса (улуш маблағларини белгиланган муддатларда ёки миқдорда киритмаслик ва ҳоказо), ҳар бир кун учун мажбурият бажарилмаган қисмининг 0,05 фоизи миқдорида пеня тўлайди. Бироқ пенянинг умумий миқдори мажбуриятнинг бажарилмаган қисми қийматининг Улушдор мажбуриятларини бажармаганлиги ёки лозим даражада бажармаганлиги учун унга белгиланадиган пенянинг умумий миқдори шартнома суммасининг 5 (беш) фоизидан ошмаслиги лозим.</span></p>
   <p class="c0"><span class="c5">5.3.&nbsp;Улушдор улуш ҳиссасини қурилиш материаллари кўринишида киритган ҳолларда материаллар сифат ва хавфсизлик талабларига жавоб бермаслиги аниқланса, тарафлар нуқсонли материаллар юзасидан далолатнома тузадилар. Улушдор далолатнома тузилганидан эътиборан 5 (беш) банк кунидан кечиктирмай материалларни сифатлисига алмаштириб топшириши ёки улушни пул кўринишида киритиши лозим.</span></p>
   <p class="c0"><span class="c5">5.4.&nbsp;Қурувчи томонидан асоссиз равишда қурилиш объектини топшириш муддати <br>100 (юз) кунга бузилганда Улушдор шартномани бир томонлама бекор қилишни, ўзи киритган улуш маблағларини қайтарилишини талаб қилишга ҳақли.</span></p>
   <p class="c0"><span class="c5">5.5.&nbsp;Улуш маблағларини бўлиб-бўлиб тўлаш тартиби асоссиз равишда Улушдор томонидан 3 (уч) маротаба бузилса ёки 3 (уч) ойдан ортиқ тўлов жадвалига риоя қилинмаган ёхуд тўлиқ тўланмай кечиктирилган ҳолларда, Қурувчи шартнома шартлари қўпол равишда бузилганлиги асос қилиб, бир томонлама бекор қилишни талаб қилиши мумкин. Бунда, Қурувчи киритилган пул маблағларини Улушдорга қайтариш санасини маълум қилган холда, қурилиш объектини бошқа шахсларга сотиши ёки бошқача тарзда ўтказишга ҳақли.</span></p>
   <p class="c0"><span class="c5">5.6.&nbsp;Улушдор ўз маблағларини бўлиб-бўлиб тўлаш жадвалига кўра тўловни 2 (икки) маротаба ёки 2 (икки) ойдан ортиқ муддатга асоссиз кечиктирган тақдирда, киритган улуши доирасида унга тақдим этилган базавий чегирма ёки бир марталик бонусли кэшбек (чегирма) шартнома шартларини бузганлиги учун унинг розилигисиз бекор қилинишига ҳамда ушбу шартноманинг 2.1-бандига асосан қайта ҳисоб-китоб қилинишига асос бўлади.</span></p>
   <p class="c0"><span class="c5">5.7.&nbsp;Улушдор ушбу шартномага асосан қурилиши тугалланган объектни қабул қилишдан номаълум сабабларга кўра, асоссиз равишда бош тортса, уни топишнинг имкони умуман бўлмаса, Қурувчи объектни бир томонлама топширишга ҳақли бўлиб, бу ҳақида тегишли далолатнома тузилган пайтдан бошлаб хонадонга эгалик қилиш ва ундан фойдаланиш билан боғлиқ харажатлар, жавобгарлик ва хавфлар Улушдор зиммасида бўлади.</span></p>
   <p class="c0"><span class="c5">5.8.&nbsp;Томонларнинг шартномада белгиланмаган жавобгарлик масалалари Ўзбекистон Республикасининг Фуқаролик кодекси ҳамда амалдаги қонунчиликка асосан ҳал қилинади.</span></p>
   <p class="c13 c30 c40"><span class="c35 c18"></span></p>
   <p class="c13 c40"><span class="c10"><b>6.</b></span><span class="c10 c8">&nbsp;</span><span class="c10"><b>ФОРС-МАЖОР</b></span><span class="c10 c8">&nbsp;</span><span class="c10"><b>ҲОЛАТЛАРИ</b></span></p>
   <p class="c0"><span class="c5">6.1.&nbsp;Томонлар ушбу шартнома бўйича мажбуриятларни бажармаганлиги ёки тегишлича бажармаганлиги учун, агар бундай вазият ушбу шартнома тузилгандан кейин томонлар олдиндан билиши, оқилона чоралар билан олдини олиши мумкин бўлмаган фавқулодда хусусиятга эга воқеалар натижасида вужудга келган енгиб бўлмайдиган куч (форс-мажор ҳолатлари) туфайли юзага келганлигини ва томонлар ўз мажбуриятларини тегишлича бажариш юзасидан барча мумкин бўлган ва ўзларига боғлиқ бўлган чораларни кўрганлигини исботласа, жавоб бермайди.</span></p>
   <p class="c0"><span class="c5">6.2.&nbsp;Форс-мажор ҳолатларига ҳарбий ҳаракатлар, табиат кучлари таъсири (зилзила, сув тошқини ва ҳоказолар), давлат органлари қарорлари ва бошқа ҳолатлар киради.</span></p>
   <p class="c0"><span class="c5">6.3.&nbsp;Форс-мажор ҳолатлари юзага келиши тўғрисида томонлар бундай ҳолатлар юзага келган вақтдан бошлаб 5 (беш) иш куни давомида бир-бирларини хабардор қилишлари керак.</span></p>
   <p class="c0"><span class="c5">6.4.&nbsp;Форс-мажор ҳолатлари юзага келган тақдирда, мазкур шартнома бўйича мажбуриятларни бажариш муддати мутаносиб равишда ушбу ҳодисалар рўй берган муддатга сурилади.</span></p>
   <p class="c0 c30"><span class="c18 c35"></span></p>
   <p class="c13 c40"><span class="c10"><b>7.</b></span><span class="c10 c8">&nbsp;</span><span class="c10"><b>НИЗОЛАРНИ</b></span><span class="c10 c8">&nbsp;</span><span class="c10">ҲАЛ</span><span class="c10 c8">&nbsp;</span><span class="c10"><b>ҚИЛИШ</b></span><span class="c10 c8">&nbsp;</span><span class="c10"><b>ТАРТИБИ</b></span></p>
   <p class="c0"><span class="c5">7.1.&nbsp;Ушбу шартномада назарда тутилган мажбуриятларни бажариш муносабати билан юзаган келадиган ёки мазкур мажбуриятларни бажариш чоғида юзага келадиган барча низолар томонлар ўртасида музокаралар ўтказиш йўли билан ҳал этилади. </span></p>
   <p class="c0"><span class="c5">7.2.&nbsp;Низолар музокараларни ўтказиш натижасида ҳал этилмаса, Ўзбекистон Республикаси қонун ҳужжатларига мувофиқ, Тошкент туманлараро иқтисодий судида ёки бошқа судловга тааллуқлилигига қараб фуқаролик ишлари бўйича судларда кўриб чиқилади.</span></p>
   <p class="c13 c30 c40"><span class="c22 c18"></span></p>
   <p class="c13 c40"><span class="c10"><b>8.</b></span><span class="c10 c8">&nbsp;</span><span class="c10"><b>БОШҚА</b></span><span class="c10 c8">&nbsp;</span><span class="c10"><b>ШАРТЛАР</b></span></p>
   <p class="c0"><span class="c5">8.1.&nbsp;Шартнома икки нусхада тузилган бўлиб, улар бир хил юридик кучга эга. Томонлар уни имзолаб, Қурувчи томонидан «Улушли қурилишда қатнашиш доирасида тузилган шартномаларнинг ягона реестри»га киритганидан ва тегишли тартибда рўйхатга олганидан сўнг, шартнома ҳақиқий ҳисобланади.</span></p>
   <p class="c0"><span class="c5">8.2.&nbsp;Ушбу шартномага киритилган барча ўзгартиришлар ва қўшимчалар, ушбу шартноманинг ажралмас қисми ҳисобланиб, битимнинг ёзма шаклига риоя қилинган ҳолда расмийлаштирилиб, томонларнинг ваколатли вакиллари томонидан имзоланиб, сўнгра тегишли тартибда тасдиқланиши шарт. Шартнома ва унинг қўшимча келишувлари тузилиб, «Улушли қурилишда қатнашиш доирасида тузилган шартномаларнинг ягона реестри»га киритилмаслиги ва унга кўра рўйхатга олинмаслиги битимларнинг хақиқий эмаслиги оқибатларини келтириб чиқариши мумкин.</span></p>
   <p class="c0"><span class="c5">8.3.&nbsp;Қурилиш объекти Улушдорга топширилиб, кафолат муддати тугагандан сўнг, аниқланган қурилишдаги яширин нуқсонлар билан боғлиқ низолар амалдаги қонунчилик талабларидан келиб чиққан ҳолда ҳал қилинади. </span></p>
   <p class="c0"><span class="c5">8.4.&nbsp;Томонлар ушбу шартнома шартлари бўйича ўзларига маълум бўлган шахсий ва тижорат сирларини ташкил этувчи (махфий) маълумотлар сир сақланишини ва учинчи шахслар олдида ошкор этилмаслигини кафолатлайдилар. Қонунчиликда назарда тутилган ҳолатлар бундан мустасно.</span></p>
   <p class="c0"><span class="c5">8.5.&nbsp;Томонлар ўзаро алоқа қилишларини инобатга олиб, юридик ва жисмоний манзиллардан ташқари, инновацион технологиялардан фойдаланиб, ушбу шартнома доирасида мобил алоқа телефон рақамларини ёки электрон почта манзилларини, шунингдек ижтимоий тармоқдаги аккаунт (телеграм, инстаграм ва хоказолар) манзилларини &nbsp;тақдим этадилар.</span></p>
   <p class="c0"><span class="c5">Алоқа мақсадида, томонлар бир-бирларига тегишли хабарномаларни СМС орқали мобил телефон рақамга ёки электрон почта манзилига юборишлари мумкин. Алоқа воситасининг тури ва шаклидан қатъий назар, юборилган барча хабарномалар хақиқатда жўнатилган ва бошқа томон уни қабул қилган хисобланади.</span></p>
   <p class="c0"><span class="c5">Улушдор ўзининг почта ва бошқа манзилли реквизитларига оид барча ўзгаришларини ташкил этувчи маълумотларни Қурувчига бундай ўзгаришлар содир бўлган кундан бошлаб 5 (беш) кундан кечиктирмай хабар беришга мажбурдир. Ушбу тарздаги ўзгаришлар тўғрисида билдиришнома бўлмаган тақдирда, хар қандай ёзишмалар (хабарнома) Қурувчига маълум бўлган сўнгги реквизитларга мувофиқ юборилади ва хатто адресант ўз маълумотларини, шу жумладан телефон рақамини, электрон почта манзилини ўзгартирган бўлса ҳам тўғри етказилган ҳисобланади.</span></p>
   <p class="c13 c30 c40"><span class="c1"></span></p>
   <p class="c13 c40"><span class="c10"><b>9.</b></span><span class="c10 c8">&nbsp;</span><span class="c10"><b>ШАРТНОМАНИНГ</b></span><span class="c10 c8">&nbsp;</span><span class="c10"><b>АМАЛ</b></span><span class="c10 c8">&nbsp;</span><span class="c10"><b>ҚИЛИШ</b></span><span class="c10 c8">&nbsp;</span><span class="c10"><b>МУДДАТИ</b></span></p>
   <p class="c0"><span class="c12">9.1.</span><span class="c12 c8">&nbsp;</span><span class="c12">Ушбу</span><span class="c12 c8">&nbsp;</span><span class="c12">Шартнома</span><span class="c12 c8">&nbsp;</span><span class="c5">8.1.-бандга риоя этиб имзоланганидан бошлаб кучга киради ва шартноманинг амал қилиш муддати томонлар ўз мажбуриятларини тўлиқ бажаргунларига қадар амал қилади.</span></p>
   <p class="c0"><span class="c5">9.2.&nbsp;Шартноманинг 2.3-бандига кўра, бўлиб-бўлиб тўлаш шарти бўйича улушни тақдим этишнинг улуш сифатида тўланиши лозим бўлган дастлабки тўловни Улушдор томонидан <br>3 (уч) кун ичида киритиш муддати ва шартлари бузилган тақдирда, мазкур шартнома Қурувчи томонидан хабардор этиш мажбуриятисиз, бекор қилинган ҳисобланади ва шартноманинг ўз кучини йўқотишига, томонлар учун ҳеч қандай мажбуриятлар келтириб чиқармаслигига сабаб бўлади.</span></p>
   <p class="c0"><span class="c12">9.3.&nbsp;Томонлар мазкур шартноманинг барча шартларини тўлиқ бажарган тақдирда, унинг амал қилиши </span><span class="c5 c8">шартноманинг 9.1-банди белгиланган муддатдан илгари тугатилиши мумкин.</span></p>
   <p class="c0"><span class="c5 c8">9.4.&nbsp;Шартнома томонлар имзолаган пайтдан бошлаб кучга киради. Агар 3 (уч) иш куни ичида 1-сонли иловага мувофиқ дастлабки тўлов амалга оширилмаган бўлса, у ҳолда шартнома ўз кучини йўқотади.</span></p>
   <p class="c30 c55"><span class="c5 c8"></span></p>
   <p class="c13"><span class="c1"><b>10.</b></span><span class="c1 c8">&nbsp;</span><span class="c1"><b>ТОМОНЛАРНИНГ</b></span><span class="c1 c8">&nbsp;</span><span class="c1"><b>МАНЗИЛЛАРИ</b></span><span class="c1 c8">&nbsp;</span><span class="c1"><b>ВА</b></span><span class="c1 c8">&nbsp;</span><span class="c1"><b>БАНК</b></span><span class="c1 c8">&nbsp;</span><span class="c1"><b>РEКВИЗИТЛАРИ</b></span></p>
   <p class="c6"><span class="c1"></span></p>
   <a id="t.b3ef2c98636c39e3b107e6ab3bfefccc3516b1e3"></a><a id="t.0"></a>
   <table class="c63">
      <tbody>
         <tr class="c11">
            <td class="c44" colspan="1" rowspan="1">
               <p class="c13"><span class="c10"><b>«ҚУРУВЧИ»</b></span></p>
            </td>
            <td class="c34" colspan="1" rowspan="1">
               <p class="c13"><span class="c1"><b>«УЛУШДОР»</b></span></p>
            </td>
         </tr>
         <tr class="c11">
            <td class="c44" colspan="1" rowspan="1">
               <p class="c13"><span class="c10 c33"><b>"<?php echo e($data['company_name']); ?>" масъулияти чекланган жамияти</b></span></p>
            </td>
            <td class="c34" colspan="1" rowspan="1">
               <p class="c9"><span class="c10"><b>Ф.И.Ш.</b> </span><span class="c10 c33"><b><?php echo e($data['last_name']); ?> <?php echo e($data['first_name']); ?> <?php echo e($data['middle_name']); ?></b></span></p>
            </td>
         </tr>
         <tr class="c11">
            <td class="c44" colspan="1" rowspan="1">
               <p class="c9"><span class="c14 c12"><?php echo e($data['company_address']); ?></span></p>
               <p class="c9"><span class="c14 c12">х/р <?php echo e($data['company_settlement']); ?></span></p>
               <p class="c9"><span class="c14 c12">АТБ <?php echo e($data['company_bank']); ?></span></p>
               <p class="c9"><span class="c14 c12">МФО <?php echo e($data['company_mfo']); ?></span></p>
               <p class="c9"><span class="c14 c12">ИНН <?php echo e($data['company_inn']); ?></span></p>
               <p class="c9"><span class="c14 c12">ОКЭД <?php echo e($data['company_oked']); ?></span></p>
               <p class="c6"><span class="c14 c12"></span></p>
               <p class="c6"><span class="c14 c12"></span></p>
               <p class="c9"><span class="c12 c33">Телефон: <?php echo e($data['company_phone']); ?></span></p>
            </td>
            <td class="c34" colspan="1" rowspan="1">
               <p class="c9"><span class="c14 c12">Паспорт ёки ID рақами: <?php echo e($data['series_number']); ?>,</span></p>
               <p class="c9"><span class="c14 c12">берилган санаси <?php echo e(date('d.m.Y',strtotime($data['given_date']))); ?>й.,</span></p>
               <p class="c9"><span class="c14 c12">ким томонидан: <?php echo e($data['issued_by']); ?></span></p>
               <p class="c9"><span class="c14 c12">ЖШИИР <?php echo e($data['client_inn']); ?></span></p>
               <p class="c9"><span class="c14 c12">Прописка: <?php echo e($data['client_address']); ?></span></p>
               <p class="c9"><span class="c14 c12">Телефон: <?php echo e($data['phone_number']); ?></span></p>
               <p class="c9"><span class="c14 c12">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php echo e($data['additional_phone']); ?></span></p>
               <p class="c6"><span class="c5"></span></p>
            </td>
         </tr>
         <tr class="c11">
            <td class="c44" colspan="1" rowspan="1">
               <p class="c9"><span class="c14 c12">Директор ________________ <?php echo e($data['company_director']); ?></span></p>
            </td>
            <td class="c34" colspan="1" rowspan="1">
               <p class="c9"><span class="c10 c33"><b><?php echo e($data['last_name']); ?> <?php echo e($data['first_name']); ?> <?php echo e($data['middle_name']); ?></b> </span><span class="c1">_____________________________</span></p>
            </td>
         </tr>
         <tr class="c11">
            <td class="c44" colspan="1" rowspan="1">
               <p class="c9"><span class="c5">М.П.</span></p>
            </td>
            <td class="c34" colspan="1" rowspan="1">
               <p class="c6"><span class="c1"></span></p>
            </td>
         </tr>
      </tbody>
   </table>

   <?php if($discount): ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <table border="1" style="width: 2000pt; border-collapse: collapse; margin-left: 40pt;">
            
            <tr style="height:12.2pt;">
                <td colspan="2" style="width:286.9pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:10.5pt;"><strong><span style="font-family:'Times New Roman';">Шартноманинг умумий суммаси:</span></strong></p>
                </td>
                <td style="width:152.25pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:10.5pt;"><strong><span style="font-family:'Times New Roman';">
                        <?php
                            echo number_format($data['price_sell'],0,',',' ');  
                        ?>
                        сум
                    </span></strong></p>
                </td>
            </tr>
            <tr style="height:12.2pt;">
                <td colspan="2" style="width:286.9pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:10.5pt;"><strong><span style="font-family:'Times New Roman';">100% тўлов суммаси:</span></strong></p>
                </td>
                <td style="width:152.25pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:10.5pt;"><strong><span style="font-family:'Times New Roman';">
                        <?php
                            echo number_format($data['price_sell'],0,',',' ');  
                        ?>
                        сум
                    </span></strong></p>
                </td>
            </tr>
            <tr style="height:28.55pt;">
                <td colspan="2" style="width:286.9pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:10.5pt;"><strong><span style="line-height:115%; font-family:'Times New Roman'; font-size:9pt;"><?php echo e((($discount) ? $discount: 0)); ?>% чегирма билан ҳисобланган тўлов суммаси</span></strong><strong><span style="font-family:'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></strong></p>
                </td>
                <td style="width:152.25pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:10.5pt;"><strong><span style="font-family:'Times New Roman';">
                        <?php
                            if ($discount > 0) {
                                echo number_format($data['price_sell']-(($data['price_sell']/100) * $discount),0,',',' ');  
                            }
                        ?>
                    </span></strong><strong><span style="font-family:'Times New Roman';">&nbsp;&nbsp;</span></strong><strong><span style="font-family:'Times New Roman';">сум</span></strong></p>
                </td>
            </tr>

            <tr style="height:28.55pt;">
                <td colspan="2" style="width:286.9pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:10.5pt;"><strong><span style="line-height:115%; font-family:'Times New Roman'; font-size:9pt;">
                        Жами бўлиб-бўлиб киритиладиган умумий сумма:
                    </span></strong><strong><span style="font-family:'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></strong></p>
                </td>
                <td style="width:152.25pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:10.5pt;"><strong><span style="font-family:'Times New Roman';">
                        0,00
                    </span></strong><strong><span style="font-family:'Times New Roman';">&nbsp;&nbsp;</span></strong><strong><span style="font-family:'Times New Roman';"> сум</span></strong></p>
                </td>
            </tr>
            
        </table>
    <?php endif; ?>

    <?php if(!empty($has_pay_status) && count($has_pay_status) > 0): ?>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <p class="c9 c62"><span class="c58 c56 c33"><?php echo e(date('Y',strtotime($data['date_deal']))); ?> йил <?php echo e(date('d',strtotime($data['date_deal']))); ?> <?php echo e($month_name); ?>даги №</span><span class="c46 c33 c56">&nbsp;</span><span class="c33 c46"><?php echo e($data['contract_number']); ?> </span><span class="c35 c18">сонли</span></p>
       <p class="c9 c48"><span class="c56 c58">“Улуш киритиш асосида турар-жой &nbsp;биноси қурилишида иштирок этиш тўғрисидаги шартнома”га </span><span class="c39"><b>1-илова</b></span></p>
       <p class="c13 c30"><span class="c50 c18"></span></p>
       <p class="c13"><span class="c50 c18"><b>Улушни бўлиб-бўлиб киритишга оид</b></span></p>
       <p class="c13"><span class="c50 c18"><b>Т Ў Л О В &nbsp; &nbsp;Ж А Д В А Л И</b></span></p>
       <p class="c13 c30"><span class="c18 c50"></span></p>
       <p class="c55 c66"><span class="c12 c33">“<?php echo e($data['company_name']); ?>”</span><span class="c10 c33">&nbsp;</span><span class="c18 c43">директори</span><span class="c31">&nbsp;</span><span class="c12 c33"><?php echo e($data['company_director']); ?></span><span class="c31">. </span><span class="c43 c18">(“Қурувчи”) ва фуқаро </span><span class="c10 c33"><b><?php echo e($data['last_name']); ?> <?php echo e($data['first_name']); ?> <?php echo e($data['middle_name']); ?></b></span><span class="c31 c33">&nbsp;</span><span class="c43 c18">(“Улушдор”) ушбу</span><span class="c26 c18">&nbsp;жадвал асосида тўлов миқдори ва муддатлари тўғрисида келишдилар:</span></p>
       <p class="c55 c30 c66"><span class="c18 c26"></span></p>
       <a id="t.8996302a00e00716684404809a41a8b713a406eb"></a><a id="t.1"></a>
       <div style="width: 100%; height: 50px; border: 1px solid #000;">
           
       </div>
       <table border="1" style="width: 2000pt; border-collapse: collapse; margin-left: 40pt;">
          
             <tr>
                <td style="padding: 2px 0; text-align: center;" colspan="2" rowspan="1">
                   <b>Шартноманинг умумий суммаси</b>
                </td>
                <td style="padding: 2px 0; text-align: center;" colspan="1" rowspan="1">
                   <b> 
                        <?php
                            echo number_format($data['price_sell'],0,',',' ');  
                        ?>
                    </b>
                </td>
             </tr>

             <?php if(!empty($data['initial_fee'])): ?>
                <tr>
                    <td style="padding: 2px 0; text-align: center;" colspan="2" rowspan="1">
                        <b><?php echo e((($percent) ? $percent: 0)); ?>% олдиндан тўлов сўммаси</b>
                    </td>
                    <td style="padding: 2px 0; text-align: center;" colspan="1" rowspan="1">
                        <b><?php echo e(number_format($data['initial_fee'],0,',',' ')); ?>сум</b>
                    </td>
                </tr>
            <?php endif; ?>
            <?php if($data['initial_fee_discount'] > 0): ?>  
                <tr>
                    <td style="padding: 2px 0; text-align: center;" colspan="2" rowspan="1">
                        <b>
                            Шу жумладан тақдим этилган 
                            <?php
                                if ($data['initial_fee_discount'] > 0 && $data['initial_fee'] > 0) {
                                    echo $data['initial_fee_discount'];
                                }
                                else{
                                    echo "0";
                                }
                            ?>
                            % чегирманинг хисобланган суммаси:
                        </b>
                    </td>
                    <td style="padding: 2px 0; text-align: center;" colspan="1" rowspan="1">
                        <b>
                            
                            <?php
                                $pred = 0;
                                if ($data['initial_fee_discount'] > 0 && $data['initial_fee'] > 0) {
                                    
                                    $pred = ($data['initial_fee'] - ($data['initial_fee']/100) * $data['initial_fee_discount']);
                                    echo number_format($pred,0,',',' ');
                                }
                                else{
                                    echo '000.000.000';
                                }
                            ?>
                            сум
                        </b>
                    </td>
                </tr>
            <?php endif; ?>
            <tr>
                <td style="padding: 2px 0; text-align: center;" colspan="1" rowspan="1">
                    <b>Жами бўлиб-бўлиб киритиладиган умумий сумма:</b>
                </td>
                <td>
                    <b>
                        <?php echo e(number_format($data['price_sell']-$data['initial_fee'],0,',',' ')); ?>

                        сум
                    </b>                    
                </td>
            </tr>
            <tr>
                <td style="padding: 2px 0; text-align: center;" colspan="1" rowspan="1">
                    <b>Тўлов ойлари</b>
                </td>
                <td style="padding: 2px 0; text-align: center;" colspan="1" rowspan="1">
                    <b>Тўлов муддати</b>
                </td>
                <td style="padding: 2px 0; text-align: center;" colspan="1" rowspan="1">
                    <b>Тўлов миқдори (сўмда)</b>                    
                </td>
            </tr>

            <?php $i = 1; ?> <?php $__currentLoopData = $has_pay_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style="padding: 2px 0; text-align: center;" class="c2" colspan="1" rowspan="1">
                   <b><?php echo e($i); ?></b>
                </td>
                <td style="padding: 2px 0; text-align: center;" colspan="1" rowspan="1">
                   <b><?php echo e(date('d.m.Y', strtotime($value->must_pay_date))); ?> йилгача</b>
                </td>
                <td style="padding: 2px 0; text-align: center;" colspan="1" rowspan="1">
                   <b><?php echo e(number_format($value->price,0,',',' ')); ?> сўм</b>
                </td>
            </tr>
            <?php $i++; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <tr>
                <td  style="padding: 2px 5px; text-align: center;" colspan="2" rowspan="1">
                   <b>ЖАМИ БЎЛИБ-БЎЛИБ КИРИТИЛАДИГАН УЛУШ</b>
                </td>
                <td style="padding: 2px 0; text-align: center;" colspan="1" rowspan="1">
                   <b><?php echo e(number_format($data['price_sell']-$data['initial_fee'],0,',',' ')); ?></b>
                </td>
             </tr>
       </table>
       <p class="c25"><span class="c35 c18"></span></p>
       <a id="t.073151122971ac671e2efbc78b7727ed02e787ae"></a><a id="t.2"></a>
       <table class="c3">
          
             <tr class="c51">
                <th class="c61" colspan="1" rowspan="1">
                   <p class="c36"><b>“ҚУРУВЧИ”</b></p>
                   <p class="c29"><b class="c22 c18"></b></p>
                   <p class="c36"><b>_____________________________________</b></p>
                </th>
                <th class="c59" colspan="1" rowspan="1">
                   <p class="c36"><b>“УЛУШДОР”</b></p>
                   <p class="c29"><b class="c22 c18"></b></p>
                   <p class="c36"><b>__________________________________</b></p>
                </th>
             </tr>
          
       </table>
    <?php endif; ?>
</body>
</html>

<?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/deal/edits.blade.php ENDPATH**/ ?>