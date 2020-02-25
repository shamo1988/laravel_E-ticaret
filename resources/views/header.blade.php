<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">




    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="{{ url('/css/dd.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ url('/css/flags.css') }}" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <title>Ana səhifə</title>
    
    <style>

        ul{
            margin:0;
            padding:0;
            list-style-type: none;
        }
        button{
                 cursor: pointer;
 
        }
        
    .myAlert-bottom{
    position: fixed;
    bottom: 5px;
    right:2%;
    width: 30%;
        opacity:1;
        z-index: 1;
}
        input#number {
  text-align: center;
  border: none;
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
  margin: 0px;
  width: 40px;
  height: 40px;
}
          input#number2 {
  text-align: center;
  border: none;
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
  margin: 0px;
  width: 40px;
  height: 40px;
}
.value-button {
  display: inline-block;
  border: 1px solid #ddd;
  margin: 0px;
  width: 40px;
  text-align: center;
  vertical-align: middle;
  background: #eee;

    cursor:pointer;
}
        #decrease {
  margin-right: -4px;
  border-radius: 8px 0 0 8px;
}
        #increase {
  margin-left: -4px;
  border-radius: 0 8px 8px 0;
}
 
    </style>
</head>