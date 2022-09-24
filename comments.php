<header>
    <title>Super safe website</title>
    <link rel="stylesheet" href="./build.css">
    <script src="https://cdn.tailwindcss.com"></script>
</header>
<body class="w-screen h-screen flex flex-col justify-center items-center">
<div class="min-h-screen w-2/3 m-5 pb-14 flex flex-col items-center">
    <?php
    session_start();
    include "./user/conn.php";

    $nothing = '';

    if (isset($_POST['submit'])){
        $username = $conn->real_escape_string($_POST['username']);
        $comment = $conn->real_escape_string($_POST['comment']);

        $sql = "select * from utilisateur where nomdutilisateur='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $id = $result->fetch_assoc()['id'];
            $sql = "insert into commentaires (nomdutilisateur, commentaire) values ('$id', '$comment')";
            if ($conn->query($sql) === TRUE) {
                $nothing = $nothing . "Comment successfully posted <br/>";
            } else {
                $nothing = $nothing . "Error: cannot post comment";
            }
        } else {
            $nothing = $nothing . "User not found <br/>";
        }
    }

    function get_username($connection, $user_id){
        $sql = "select * from utilisateur where id='$user_id'";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['nomdutilisateur'];
        } else {
            return "Unknown";
        }
    }

    ?>
    <div class="mb-6">
        <h1 class="text-5xl text-center">Super safe website</h1>
        <p class="text-center">This website is super safe, you can trust us.</p>
    </div>
    <div class="<?php if (!$nothing) {echo 'hidden';} ?> w-1/2 rounded-lg bg-yellow-100 flex flex-col justify-center text-center p-5 relative m-6">
        <p class="absolute top-5 left-5 text-xl">⚠️</p>
        <?php
        echo $nothing;
        ?>
    </div>
    <div class="w-full flex justify-center items-center">
        <form
            action="comments.php"
            method="post"
            accept-charset="utf-8"
            class="w-1/3 flex flex-col justify-center items-center"
        >
            <label for="username" class="font-bold tracking-wider">Username</label>
            <input
                type="text"
                name="username"
                required
                class="w-2/3 border border-gray-400 p-2 pr-0 m-2 rounded"
            />
            <label for="comment" class="font-bold tracking-wider">Comment</label>
            <textarea
                name="comment"
                required
                class="w-2/3 border border-gray-400 p-2 pr-0 m-2 rounded"
            ></textarea>
            <button
                type="submit"
                name="submit"
                value="submit"
                class="w-1/3 bg-blue-500 hover:bg-blue-700 text-white p-2 m-2 rounded"
            >
                Comment
            </button>
        </form>
        <div class="w-2/3 h-2/3 border border-gray-400 p-2 pr-0 m-2 rounded overflow-y-scroll overflow-x-hidden break-words">
            <?php
            $sql = "SELECT * FROM commentaires";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="w-full flex items-start m-1 pr-6">
                    <p class="font-bold tracking-wider w-1/5"><?php echo htmlspecialchars(get_username($conn, $row['nomdutilisateur'])); ?></p>
                    <p class="ml-2 text-justify"><?php echo htmlspecialchars($row['commentaire']); ?></p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<div class="h-14 fixed left-0 bottom-0 w-screen border-t border-gray-400 flex bg-white">
    <div class="w-1/2 hover:underline flex flex-col justify-center items-center">
        <a href="index.php">Home</a>
    </div>
    <div class="w-1/2 hover:underline flex flex-col justify-center items-center">
        <a href="comments.php">Comments</a>
    </div>
</div>
<?php
$conn->close();
?>
</body>