<header>
    <title>Super safe website</title>
    <script src="https://cdn.tailwindcss.com"></script>
</header>
<body class="w-screen h-screen flex flex-col justify-center items-center">
    <div class="h-screen w-2/3 m-5 mb-14 flex flex-col items-center">
        <div class="mb-14">
            <h1 class="text-5xl text-center">Super safe website</h1>
            <p class="text-center">This website is super safe, you can trust us.</p>
        </div>

        <?php
        session_start();
        $logged = isset($_SESSION['id']);
        $logging = isset($_POST['login']);
        $nothing = '';

        include "./user/conn.php";

        if (isset($_POST['register'])) {
            /** @noinspection PhpUndefinedVariableInspection */
            $username = $conn->real_escape_string($_POST['nomdutilisateur']);
            $donneespersonnelles = $conn->real_escape_string("Ullamco short loin leberkas voluptate dolore short ribs officia pig fugiat capicola enim ground round hamburger tail tempor.");

            $sql = "select * from hiddenprivatedata where nomdutilisateur='$username'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $nothing = $nothing . "User already registered <br/>";
            } else {
                $sql = "insert into hiddenprivatedata (nomdutilisateur, donneespersonnelles) values ('$username', '$donneespersonnelles')";
                if ($conn->query($sql) === TRUE) {
                    $nothing = $nothing . "User successfully registered <br/>";
                    $logging = true;
                } else {
                    # $nothing = $nothing . "Error: " . $sql . "<br>" . $conn->error;
                    $nothing = $nothing . "Access denied <br/>";
                }
            }
        }

        if ($logging) {
            $username = $conn->real_escape_string($_POST['nomdutilisateur']);

            $sql = "SELECT * FROM hiddenprivatedata WHERE nomdutilisateur = '$username'";
            $result = $conn->query($sql);

            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION['id'] = $row['id'];
                $_SESSION['nomdutilisateur'] = $row['nomdutilisateur'];
                $_SESSION['donneespersonnelles'] = $row['donneespersonnelles'];

                $nothing = $nothing . "Successfully logged in <br/>";
            } else {
                $nothing = $nothing . "Failed to login <br/>";
            }
        }

        if (isset($_POST['delete'])) {
            $username = $conn->real_escape_string($_POST['nomdutilisateur']);

            $sql = "select * from hiddenprivatedata where nomdutilisateur='$username'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $id = $row['id'];

                $sql = "delete from hiddenprivatedata where id='$id' and nomdutilisateur='$username'";
                if ($conn->query($sql) === TRUE) {
                    $nothing = $nothing . "Successfully delete " . $username . " <br/>";
                } else {
                    $nothing = $nothing . "Error: cannot delete " . $username . " <br/>";
                }
            } else {
                $nothing = $nothing . "User " . $username . " doesn\'t exist <br/>";
            }
        }
        ?>

        <form
                action="./index.php"
                method="post"
                accept-charset="utf-8"
                class="w-full flex flex-col justify-center items-center"
        >
            <label for="username" class="font-bold tracking-wider">Username</label>
            <input
                    type="text"
                    name="nomdutilisateur"
                    id="username"
                    required
                    class="w-2/3 border border-gray-400 p-2 pr-0 m-2 rounded"
            >

            <div class="flex justify-center w-full">
                <button
                        type="submit"
                        name="login"
                        value="login"
                        class="w-1/3 bg-blue-500 hover:bg-blue-700 text-white p-2 m-2 rounded"
                >
                    Show data
                </button>

                <button
                        type="submit"
                        name="register"
                        value="register"
                        class="w-1/3 bg-blue-500 hover:bg-blue-700 text-white p-2 m-2 rounded"
                >
                    Sign up
                </button>

                <button
                        type="submit"
                        name="delete"
                        value="delete"
                        class="w-1/3 bg-red-500 hover:bg-red-700 text-white p-2 m-2 rounded"
                >
                    Delete
                </button>
            </div>
        </form>
        <div class="<?php if (!$nothing) {echo 'hidden';} ?> w-1/2 rounded-lg bg-yellow-100 flex flex-col justify-center text-center p-5 relative m-10">
            <p class="absolute top-5 left-5 text-xl">⚠️</p>
            <?php
            echo $nothing;
            ?>
        </div>
        <?php
            if(isset($_SESSION['id'])){
                ?>
                <div class="w-1/2 rounded-lg bg-green-50 flex flex-col justify-center text-justify p-5 relative">
                    <p class="absolute top-5 left-5 text-xl">🔓️</p>
                    <p class="mx-14">
                        <?php
                        echo "Logged as " . $_SESSION['nomdutilisateur'] . " <br/>";
                        echo $_SESSION['donneespersonnelles'];
                        ?>
                    </p>
                </div>

                <form action="./user/logout.php" method="post">
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded m-5" type="submit">Logout</button>
                </form>
                <?php
            }
        ?>
    </div>
    <?php
        $conn->close();
    ?>
</body>