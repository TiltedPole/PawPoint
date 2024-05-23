<style>
    .card-big-shadow {
        max-width: 320px;
        position: relative;
    }

    .coloured-cards .card {
        margin-top: 30px;
    }

    .card[data-radius="none"] {
        border-radius: 0px;
    }

    .card {
        border-radius: 8px;
        box-shadow: 0 2px 2px rgba(204, 197, 185, 0.5);
        background-color: #FFFFFF;
        color: #252422;
        margin-bottom: 20px;
        position: relative;
        z-index: 1;
    }


    .card[data-background="image"] .title,
    .card[data-background="image"] .stats,
    .card[data-background="image"] .category,
    .card[data-background="image"] .description,
    .card[data-background="image"] .content,
    .card[data-background="image"] .card-footer,
    .card[data-background="image"] small,
    .card[data-background="image"] .content a,
    .card[data-background="color"] .title,
    .card[data-background="color"] .stats,
    .card[data-background="color"] .category,
    .card[data-background="color"] .description,
    .card[data-background="color"] .content,
    .card[data-background="color"] .card-footer,
    .card[data-background="color"] small,
    .card[data-background="color"] .content a {
        color: #FFFFFF;
    }

    .card.card-just-text .content {
        padding: 20px 35px;
        text-align: center;
    }

    .card .content {
        padding: 10px 10px 10px 10px;
    }

    .card[data-color="blue"] .category {
        color: #7a9e9f;
    }

    .card .category,
    .card .label {
        font-size: 14px;
        margin-bottom: 0px;
    }

    .card-big-shadow:before {
        background-image: url("http://static.tumblr.com/i21wc39/coTmrkw40/shadow.png");
        background-position: center bottom;
        background-repeat: no-repeat;
        background-size: 100% 100%;
        bottom: -12%;
        content: "";
        display: block;
        left: -12%;
        position: absolute;
        right: 0;
        top: 0;
        z-index: 0;
    }

    .card .description {
        font-size: 16px;
        color: #66615b;
        overflow-y: auto;
        height: 250px
    }

    .content-card {
        margin-top: 30px;
    }

    a:hover,
    a:focus {
        text-decoration: none;
    }

    /*======== COLORS ===========*/
    .card[data-color="blue"] {
        background: #b8d8d8;
    }

    .card[data-color="blue"] .description {
        color: #506568;
    }

    .card[data-color="green"] {
        background: #d5e5a3;
    }

    .card[data-color="green"] .description {
        color: #60773d;
    }

    .card[data-color="green"] .category {
        color: #92ac56;
    }

    .card[data-color="yellow"] {
        background: #ffe28c;
    }

    .card[data-color="yellow"] .description {
        color: #b25825;
    }

    .card[data-color="yellow"] .category {
        color: #d88715;
    }

    .card[data-color="brown"] {
        background: #d6c1ab;
    }

    .card[data-color="brown"] .description {
        color: #75442e;
    }

    .card[data-color="brown"] .category {
        color: #a47e65;
    }

    .card[data-color="purple"] {
        background: #baa9ba;
    }

    .card[data-color="purple"] .description {
        color: #3a283d;
    }

    .card[data-color="purple"] .category {
        color: #5a283d;
    }

    .card[data-color="orange"] {
        background: #ff8f5e;
    }

    .card[data-color="orange"] .description {
        color: #772510;
    }

    .card[data-color="orange"] .category {
        color: #e95e37;
    }

    /* activty feed */
    .activity-feed {
        padding: 15px;
    }

    .activity-feed .feed-item {
        position: relative;
        padding-bottom: 20px;
        padding-left: 30px;
        border-left: 2px solid #e4e8eb;
    }

    .activity-feed .feed-item:last-child {
        border-color: transparent;
    }

    .activity-feed .feed-item:after {
        content: "";
        display: block;
        position: absolute;
        top: 0;
        left: -6px;
        width: 10px;
        height: 10px;
        border-radius: 6px;
        background: #fff;
        border: 1px solid #f37167;
    }

    .activity-feed .feed-item .date {
        position: relative;
        top: -5px;
        color: #8c96a3;
        text-transform: uppercase;
        font-size: 13px;
    }

    .activity-feed .feed-item .text {
        position: relative;
        top: -3px;
    }
</style>

<div class="container bootstrap snippets bootdeys">
    <div class="row">
        <div class="col-md-4 col-sm-6 content-card">
            <div class="card-big-shadow">
                <div class="card card-just-text" data-background="color" data-color="blue" data-radius="none">
                    <div class="content">
                        <h4 class="title">Activity Feed</h4>
                        <div class="description overflow-auto">
                            <div class="activity-feed">
                                <div class="feed-item">
                                    <div class="date">Sep 25</div>
                                    <div class="text">Responded to need <a href="single-need.php">“Volunteer
                                            opportunity”</a></div>
                                </div>
                                <div class="feed-item">
                                    <div class="date">Sep 24</div>
                                    <div class="text">Added an interest “Volunteer Activities”</div>
                                </div>
                                <div class="feed-item">
                                    <div class="date">Sep 23</div>
                                    <div class="text">Joined the group <a href="single-group.php">“Boardsmanship
                                            Forum”</a></div>
                                </div>
                                <div class="feed-item">
                                    <div class="date">Sep 21</div>
                                    <div class="text">Responded to need <a href="single-need.php">“In-Kind
                                            Opportunity”</a></div>
                                </div>
                                <div class="feed-item">
                                    <div class="date">Sep 18</div>
                                    <div class="text">Created need <a href="single-need.php">“Volunteer
                                            Opportunity”</a></div>
                                </div>
                                <div class="feed-item">
                                    <div class="date">Sep 17</div>
                                    <div class="text">Attending the event <a href="single-event.php">“Some New
                                            Event”</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card -->
            </div>
        </div>

        <div class="col-md-4 col-sm-6 content-card">
            <div class="card-big-shadow">
                <div class="card card-just-text" data-background="color" data-color="green" data-radius="none">
                    <div class="content" style="height: 150px">
                        <h4 class="title"><a href="{{ route('clinic.view') }}">Manage Your Clinic</a></h4>
                        <p class="description">Modify and update your clinic's information</p>
                    </div>
                </div> <!-- end card -->
            </div>
        </div>

        <div class="col-md-4 col-sm-6 content-card">
            <div class="card-big-shadow">
                <div class="card card-just-text" data-background="color" data-color="yellow" data-radius="none">
                    <div class="content" style="height: 150px">
                        <h4 class="title"><a href="{{ route('appointments.view') }}">Manage Your Appointments</a></h4>
                        <p class="description">Manage your clinics appointments</p>
                    </div>
                </div> <!-- end card -->
            </div>
        </div>

        {{-- <div class="col-md-4 col-sm-6 content-card">
            <div class="card-big-shadow">
                <div class="card card-just-text" data-background="color" data-color="brown" data-radius="none">
                    <div class="content">

                        <h4 class="title"><a href="#">Brown Card</a></h4>
                        <p class="description">What all of these have in common is that they're pulling information out
                            of the app or the service and making it relevant to the moment. </p>
                    </div>
                </div> <!-- end card -->
            </div>
        </div>

        <div class="col-md-4 col-sm-6 content-card">
            <div class="card-big-shadow">
                <div class="card card-just-text" data-background="color" data-color="purple" data-radius="none">
                    <div class="content">

                        <h4 class="title"><a href="#">Purple Card</a></h4>
                        <p class="description">What all of these have in common is that they're pulling information out
                            of the app or the service and making it relevant to the moment. </p>
                    </div>
                </div> <!-- end card -->
            </div>
        </div>

        <div class="col-md-4 col-sm-6 content-card">
            <div class="card-big-shadow">
                <div class="card card-just-text" data-background="color" data-color="orange" data-radius="none">
                    <div class="content">

                        <h4 class="title"><a href="#">Orange Card</a></h4>
                        <p class="description">What all of these have in common is that they're pulling information out
                            of the app or the service and making it relevant to the moment. </p>
                    </div>
                </div> <!-- end card -->
            </div>
        </div> --}}
    </div>
</div>
