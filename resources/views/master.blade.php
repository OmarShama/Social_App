<html>
    <head>
        <title>Social App - @yield('title')</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
        <style>
            body{margin-top:20px;}

            /*==================================================
              Post Contents CSS
              ==================================================*/

            .post-content{
                background: #f8f8f8;
                border-radius: 4px;
                width: 100%;
                border: 1px solid #f1f2f2;
                margin-bottom: 20px;
                overflow: hidden;
                position: relative;
            }

            .post-content img.post-image, video.post-video, .google-maps{
                width: 100%;
                height: auto;
            }

            .post-content .google-maps .map{
                height: 300px;
            }

            .post-content .post-container{
                padding: 20px;
            }

            .post-content .post-container .post-detail{
                margin-left: 65px;
                position: relative;
            }

            .post-content .post-container .post-detail .post-text{
                line-height: 24px;
                margin: 0;
            }

            .post-content .post-container .post-detail .reaction{
                position: absolute;
                right: 0;
                top: 0;
            }

            .post-content .post-container .post-detail .post-comment{
                display: inline-flex;
                margin: 10px auto;
                width: 100%;
            }

            .post-content .post-container .post-detail .post-comment img.profile-photo-sm{
                margin-right: 10px;
            }

            .post-content .post-container .post-detail .post-comment .form-control{
                height: 30px;
                border: 1px solid #ccc;
                box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
                margin: 7px 0;
                min-width: 0;
            }

            img.profile-photo-md {
                height: 50px;
                width: 50px;
                border-radius: 50%;
            }

            img.profile-photo-sm {
                height: 40px;
                width: 40px;
                border-radius: 50%;
            }

            .text-green {
                color: #8dc63f;
            }

            .text-red {
                color: #ef4136;
            }

            .following {
                color: #8dc63f;
                font-size: 12px;
                margin-left: 20px;
            }
        </style>
    </head>

    <body>
{{--        @section('sidebar')--}}
{{--            this is the sidebar--}}
{{--        @show--}}

        @yield('content')
    </body>
</html>
