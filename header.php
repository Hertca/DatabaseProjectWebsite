<!--
Emily Morton 
Carrie Hert
CSC 320
Database Project
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Project</title>

    <style>
        /* Color pallete 
        #EAC2B1    #F5E5DD    #2C7AAF    #F8E467    #90C6FA
        D-Pink     L-Pink     D-Blue     Yellow     L-Blue */

        body{
            background-color: #2C7AAF;
        }
        h1{
            text-align: center;
            color: white;
            font-family: 'Courier';
        }
        h3{
            color: #F8E467;
            font-family: 'Consolas';
            text-align: center;
        }
        h2{
            color: #F8E467;
            font-family: 'Consolas';
            text-align: center;
        }
        h4{
            color: #F8E467;
            font-family: 'Courier';
            text-align: center;
        }
        p{
            color: white;
            font-family: 'Courier';
            text-align: center;
        }
        .listInfo{
            height: 25px;
            background-color: #F8E467;
            border: none;
            outline: none;
            color: black;
            border-radius: 40px;
            box-shadow: 0 6px 20px -5px rgba(0,0,0,0.4);
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }
        a:link{
            color:white;
            font-family: 'Courier';
            font-weight: 700;
        }
        a:visted{
            color: black;
        }
        .createform{
            margin: 0 auto;
        }
        .createform * {
            box-sizing: border-box;
        }
        .first li,.second li,.third li{
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }
        .first,.second,.third{
            padding: 0 8px
            justify-content space-between;
        }
        .submit{
            height: 25px;
            background-color: #F8E467;
            border: none;
            outline: none;
            color: black;
            border-radius: 40px;
            box-shadow: 0 6px 20px -5px rgba(0,0,0,0.4);
            position: relative;
            overflow: hidden;
            cursor: pointer;

        }
        .finalsubmit{
            width: 140px;
            height: 50px;
            background-color: #F8E467;
            border: none;
            outline: none;
            color: black;
            border-radius: 40px;
            box-shadow: 0 6px 20px -5px rgba(0,0,0,0.4);
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }
        .headform{
            color: white;
            font-family: 'Consolas';
            text-align: left;
        }


    </style>
</head>
