<!DOCTYPE html>
<html lang="en">


<style>
    body {
        margin-top: 20px;
    }

    .idance .classes-details ul.timetable {
        margin: 0 0 22px;
        padding: 0;
    }

    .idance .classes-details ul.timetable li {
        list-style: none;
        font-size: 15px;
        color: #7f7f7f;
    }

    idance .timetable {
        max-width: 900px;
        margin: 0 auto;
    }

    .idance .timetable-item {
        border: 1px solid #d8e3eb;
        padding: 15px;
        margin-top: 20px;
        position: relative;
        display: block;
    }

    @media (min-width: 768px) {
        .idance .timetable-item {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }
    }

    .idance .timetable-item-img {
        overflow: hidden;
        height: 100px;
        width: 100px;
        display: none;
    }

    .idance .timetable-item-img img {
        height: 100%;
    }

    @media (min-width: 768px) {
        .idance .timetable-item-img {
            display: block;
        }
    }

    .idance .timetable-item-main {
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        position: relative;
        margin-top: 12px;
    }

    @media (min-width: 768px) {
        .idance .timetable-item-main {
            margin-top: 0;
            padding-left: 15px;
        }
    }

    .idance .timetable-item-time {
        font-weight: 500;
        font-size: 16px;
        margin-bottom: 4px;
    }

    .idance .timetable-item-name {
        font-size: 14px;
        margin-bottom: 19px;
    }

    .idance .btn-book {
        padding: 6px 30px;
        width: 100%;
    }

    .idance .timetable-item-like {
        position: absolute;
        top: 3px;
        right: 3px;
        font-size: 20px;
        cursor: pointer;
    }

    .idance .timetable-item-like .fa-heart-o {
        display: block;
        color: #b7b7b7;
    }

    .idance .timetable-item-like .fa-heart {
        display: none;
        color: #f15465;
    }

    .idance .timetable-item-like:hover .fa-heart {
        display: block;
    }

    .idance .timetable-item-like:hover .fa-heart-o {
        display: none;
    }

    .idance .timetable-item-like-count {
        font-size: 12px;
        text-align: center;
        padding-top: 5px;
        color: #7f7f7f;
    }

    .idance .timetable-item-book {
        width: 200px;
    }

    .idance .timetable-item-book .btn {
        width: 100%;
    }

    .idance .schedule .nav-tabs {
        border-bottom: 2px solid #104455;
    }

    .idance .schedule .nav-link {
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        font-size: 12px;
        text-align: center;
        text-transform: uppercase;
        color: #3d3d3d;
        font-weight: 500;
        -webkit-transition: none;
        -o-transition: none;
        transition: none;
        border-radius: 2px 2px 0 0;
        padding-left: 0;
        padding-right: 0;
        cursor: pointer;
    }

    @media (min-width: 768px) {
        .idance .schedule .nav-link {
            font-size: 16px;
        }
    }

    .idance .schedule .nav-link.active {
        background: #104455;
        border-color: #104455;
        color: #fff;
    }

    .idance .schedule .nav-link.active:focus {
        border-color: #104455;
    }

    .idance .schedule .nav-link:hover:not(.active) {
        background: #46c1be;
        border-color: #46c1be;
        color: #fff;
    }

    .idance .schedule .tab-pane {
        padding-top: 10px;
    }
</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Appointments</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <link href="/bootstrap-5.3.2-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/d491c37d6e.js" crossorigin="anonymous"></script>

    <style type="text/css" id="operaUserStyle"></style>
</head>

<body>
    <x-navbar />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <div class="idance">
        <div class="schedule content-block">
            <div class="container">
                <h2 data-aos="zoom-in-up" class="aos-init aos-animate">Schedule</h2>

                <div class="timetable">

                    <!-- Schedule Top Navigation -->
                    <nav class="nav nav-tabs">
                        <a class="nav-link active">Mon</a>
                        <a class="nav-link">Tue</a>
                        <a class="nav-link">Wed</a>
                        <a class="nav-link">Thu</a>
                        <a class="nav-link">Fri</a>
                        <a class="nav-link">Sat</a>
                        <a class="nav-link">Sun</a>
                    </nav>

                    <div class="tab-content">
                        <div class="tab-pane show active">
                            <div class="row">

                                <!-- Schedule Item 1 -->
                                <div class="col-md-6">
                                    <div class="timetable-item">
                                        <div class="timetable-item-img">
                                            <img src="https://www.bootdey.com/image/100x80/FFB6C1/000000"
                                                alt="Contemporary Dance">
                                        </div>
                                        <div class="timetable-item-main">
                                            <div class="timetable-item-time">4:00pm - 5:00pm</div>
                                            <div class="timetable-item-name">Contemporary Dance</div>
                                            <a href="#" class="btn btn-primary btn-book">Book</a>
                                            <div class="timetable-item-like">
                                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                                <div class="timetable-item-like-count">11</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Schedule Item 2 -->
                                <div class="col-md-6">
                                    <div class="timetable-item">
                                        <div class="timetable-item-img">
                                            <img src="https://www.bootdey.com/image/100x80/00FFFF/000000"
                                                alt="Break Dance">
                                        </div>
                                        <div class="timetable-item-main">
                                            <div class="timetable-item-time">5:00pm - 6:00pm</div>
                                            <div class="timetable-item-name">Break Dance</div>
                                            <a href="#" class="btn btn-primary btn-book">Book</a>
                                            <div class="timetable-item-like">
                                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                                <div class="timetable-item-like-count">28</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Schedule Item 3 -->
                                <div class="col-md-6">
                                    <div class="timetable-item">
                                        <div class="timetable-item-img">
                                            <img src="https://www.bootdey.com/image/100x80/8A2BE2/000000"
                                                alt="Street Dance">
                                        </div>
                                        <div class="timetable-item-main">
                                            <div class="timetable-item-time">5:00pm - 6:00pm</div>
                                            <div class="timetable-item-name">Street Dance</div>
                                            <a href="#" class="btn btn-primary btn-book">Book</a>
                                            <div class="timetable-item-like">
                                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                                <div class="timetable-item-like-count">28</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Schedule Item 4 -->
                                <div class="col-md-6">
                                    <div class="timetable-item">
                                        <div class="timetable-item-img">
                                            <img src="https://www.bootdey.com/image/100x80/6495ED/000000"
                                                alt="Yoga">
                                        </div>
                                        <div class="timetable-item-main">
                                            <div class="timetable-item-time">7:00pm - 8:00pm</div>
                                            <div class="timetable-item-name">Yoga</div>
                                            <a href="#" class="btn btn-primary btn-book">Book</a>
                                            <div class="timetable-item-like">
                                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                                <div class="timetable-item-like-count">23</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Schedule Item 5 -->
                                <div class="col-md-6">
                                    <div class="timetable-item">
                                        <div class="timetable-item-img">
                                            <img src="https://www.bootdey.com/image/100x80/00FFFF/000000"
                                                alt="Stretching">
                                        </div>
                                        <div class="timetable-item-main">
                                            <div class="timetable-item-time">6:00pm - 7:00pm</div>
                                            <div class="timetable-item-name">Stretching</div>
                                            <a href="#" class="btn btn-primary btn-book">Book</a>
                                            <div class="timetable-item-like">
                                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                                <div class="timetable-item-like-count">14</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Schedule Item 6 -->
                                <div class="col-md-6">
                                    <div class="timetable-item">
                                        <div class="timetable-item-img">
                                            <img src="https://www.bootdey.com/image/100x80/008B8B/000000"
                                                alt="Street Dance">
                                        </div>
                                        <div class="timetable-item-main">
                                            <div class="timetable-item-time">8:00pm - 9:00pm</div>
                                            <div class="timetable-item-name">Street Dance</div>
                                            <a href="#" class="btn btn-primary btn-book">Book</a>
                                            <div class="timetable-item-like">
                                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                                <div class="timetable-item-like-count">9</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<x-footer />

</html>
