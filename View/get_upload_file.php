<?php
include_once("./index.html");
session_start();
if (((isset($_SESSION['email'])) && $_SESSION['loggedin'] == true)) { ?>
    <form action="./get_upload_file_request.php" method="post" enctype="multipart/form-data">
        <div class="container mt-5" style="margin: auto;">
            <!-- Example single danger button -->
            <div class="">
                <label for="formFileLg" class="form-label">Large file input example</label>
                <input class="form-control form-control-lg btn-outline-danger" id="formFileLg" type="file" name="excel"><br>
                <a class="btn btn-outline-danger btn-lg px-5" role="button" aria-disabled="true" href="./show_student.php">Show Previous Icards</a>
            </div>
            <div class="mt-5 font w-50 d-flex">
                <button class="btn btn-outline-danger btn-lg px-5" type="submit" name="import">Upload</button>
            </div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col">
                        <div class="dropdown m-2">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Update
                            </button>
                            <ul class="dropdown-menu">
                                <?php
                                $j = 5;
                                for ($i = (intval(date('Y')) - $j); $i <= intval(date('Y')); $i++, $j--) {
                                    echo "<li><a class='dropdown-item' href='./update.php?year=$i'>$i</a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown m-2">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Delete
                            </button>
                            <ul class="dropdown-menu">
                                <?php
                                $j = 5;
                                for ($i = (intval(date('Y')) - $j); $i <= intval(date('Y')); $i++, $j--) {
                                    echo "<li><a class='dropdown-item' href='./delete.php?year=$i'>$i</a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown m-2">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Select
                            </button>
                            <ul class="dropdown-menu">
                                <?php
                                $j = 5;
                                for ($i = (intval(date('Y')) - $j); $i <= intval(date('Y')); $i++, $j--) {
                                    echo "<li><a class='dropdown-item' href='./select.php?year=$i'>$i</a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <a class="btn btn-danger btn-lg px-5" role="button" aria-disabled="true" href="./insert.php">Insert_Manually</a>
                    </div>
                </div>
            </div>
        </div>
        </div>

    <?php
} else {
    header("location:./login.php");
}
    ?>