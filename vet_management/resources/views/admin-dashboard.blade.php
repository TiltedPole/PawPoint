<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>PawPoint</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <link href="/bootstrap-5.3.2-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/d491c37d6e.js" crossorigin="anonymous"></script>

    <style type="text/css" id="operaUserStyle"></style>
    <style type="text/css">
        /* Chart.js */
        @font-face {
            font-weight: 400;
            font-style: normal;
            font-family: circular;

            src: url('chrome-extension://liecbddmkiiihnedobmlmillhodjkdmb/fonts/CircularXXWeb-Book.woff2') format('woff2');
        }

        @font-face {
            font-weight: 700;
            font-style: normal;
            font-family: circular;

            src: url('chrome-extension://liecbddmkiiihnedobmlmillhodjkdmb/fonts/CircularXXWeb-Bold.woff2') format('woff2');
        }
    </style>
    <style>
        .nav-link {
            color: black !important;
            float: left;
        }
    </style>
</head>

<body style="background: #f8f9fa">
    <x-navbar />
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 col-12 sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column py-3">
                        <li class="nav-item">
                            <button type="button" class="btn btn-light w-100">
                                <a href="#dashboard-section" class="nav-link active dashboard-nav">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                    Dashboard
                                </a>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-light w-100">
                                <a href="#clients-patients-section" class="nav-link dashboard-nav">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                                        <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                        <polyline points="13 2 13 9 20 9"></polyline>
                                    </svg>
                                    Client and Patients
                                </a>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-light w-100">
                                <a href="#stock-section" class="nav-link dashboard-nav">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-shopping-cart">
                                        <circle cx="9" cy="21" r="1"></circle>
                                        <circle cx="20" cy="21" r="1"></circle>
                                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                        </path>
                                    </svg>
                                    Stock
                                </a>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-light w-100">
                                <a href="#message-board-section" class="nav-link dashboard-nav">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                    Message Board
                                </a>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-light w-100">
                                <a href="#care-plan-section" class="nav-link dashboard-nav">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-layers">
                                        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                        <polyline points="2 17 12 22 22 17"></polyline>
                                        <polyline points="2 12 12 17 22 12"></polyline>
                                    </svg>
                                    Nursing Care Plan
                                </a>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-light w-100">
                                <a href="#reports-section" class="nav-link dashboard-nav">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-bar-chart-2">
                                        <line x1="18" y1="20" x2="18" y2="10"></line>
                                        <line x1="12" y1="20" x2="12" y2="4"></line>
                                        <line x1="6" y1="20" x2="6" y2="14"></line>
                                    </svg>
                                    Reports
                                </a>
                            </button>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div id="dashboard-section">
                    <h2>Dashboard</h2>
                    <x-dashboard-sections.admin-dashboard-section />
                </div>
                <div id="clients-patients-section" style="display: none;">
                    <h2>Clients and Patients</h2>
                    <x-dashboard-sections.clients-and-patients :users="$users" />
                </div>
                <div id="stock-section" style="display: none;">
                    <h2>Stock</h2>
                    <x-dashboard-sections.stock />
                </div>
                <div id="message-board-section" style="display: none;">
                    <h2>Message Board</h2>
                    <x-dashboard-sections.admin-message-board :messages="$messages" :users="$users" />
                </div>
                <div id="care-plan-section" style="display: none;">
                    <h2>Care Plan</h2>
                    <x-dashboard-sections.care-plan />
                </div>
                <div id="reports-section" style="display: none;">
                    <h2>Reports</h2>
                    <x-dashboard-sections.reports />
                </div>
            </main>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get references to the sidebar buttons
            const sidebarButtons = document.querySelectorAll(".dashboard-nav");

            // Loop through each sidebar button
            sidebarButtons.forEach(function(button) {
                // Add click event listener to each button
                button.addEventListener("click", function(event) {
                    // Prevent the default link behavior
                    event.preventDefault();

                    // Hide all sections by default
                    document.querySelectorAll("main > div").forEach(function(section) {
                        section.style.display = "none";
                    });

                    // Get the target section's ID from the href attribute of the clicked button
                    const targetSectionId = button.getAttribute("href").substring(1);

                    // Show the target section
                    document.getElementById(targetSectionId).style.display = "block";
                });

                // Add click event listener to the button itself to simulate the click on the <a> element
                button.parentNode.addEventListener("click", function(event) {
                    if (event.target.tagName === "BUTTON") {
                        // Simulate click on the <a> element within the button
                        button.click();
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Check if the URL contains the query parameter "openSection" with the value "manage-pets"
            const urlParams = new URLSearchParams(window.location.search);
            const openSection = urlParams.get('openSection');

            if (openSection === 'message-board') {
                // Display the "message-board" section
                document.querySelectorAll("main > div").forEach(function(section) {
                    section.style.display = "none";
                });
                document.getElementById("message-board-section").style.display = "block";
            }
        });
    </script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                datasets: [{
                    data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#007bff',
                    borderWidth: 4,
                    pointBackgroundColor: '#007bff'
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: false
                        }
                    }]
                },
                legend: {
                    display: false,
                }
            }
        });
    </script>

    <script src="/bootstrap-5.3.2-dist/js/bootstrap.js"></script>
</body>

<x-footer />

</html>
