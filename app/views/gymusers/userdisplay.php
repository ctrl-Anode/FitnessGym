<!doctype html>
<html lang="en">
    <head>
        <title>LavalustCrudPDO</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <style>
        .custom-header {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .custom-header h1 {
            margin: 0;
        }
        .container {
            margin-top: 20px;
        }
    </style>

    </head>
    <?php
require 'conn.php';

$search = $_GET['search'] ?? '';
$page = $_GET['page'] ?? 1;
$limit = 10;
$offset = ($page - 1) * $limit;

$total_stmt = $pdo->prepare("SELECT COUNT(*) FROM fitnessgymusers WHERE last_name LIKE ? OR first_name LIKE ?");
$total_stmt->execute(["%$search%", "%$search%"]);
$total_rows = $total_stmt->fetchColumn();

$stmt = $pdo->prepare("SELECT * FROM fitnessgymusers WHERE last_name LIKE ? OR first_name LIKE ? LIMIT ? OFFSET ?");
$stmt->execute(["%$search%", "%$search%", $limit, $offset]);
$user = $stmt->fetchAll();

$total_pages = ceil($total_rows / $limit);
?>
    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <form method="get">
        <h2>Lavalust CRUDpdo User's Data</h2>
    <div class="mb-3">
        <label for="search" class="form-label">Search using First or Last Name</label>
        <div class="input-group">
            <input type="text" name="search" id="search" placeholder="Type lastname or firstname" class="form-control" value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>
        <div class="conatiner">
        <?php flash_alert()?>
            <div class="row_mx-auto mt-4">
                <div class="col_md-5">
                    <table class="table table-bordered table-striped">
                    <thead>
                		<tr>
                            <td>ID</td>
                            <td>First Name</td>
                            <td>Middle Name</td>
                			<td>Last Name</td>
                			<td>Username</td>
                			<td>Email</td>
                            <td>Contact</td>
                			<td>Gender</td>
                            <td>Address</td>
                            <td>Password</td>
                            <td>Modify</td>
                		</tr>
                	</thead> 
                    <tbody>
                		<?php foreach($users as $user): ?>
                			<tr>
                				<td><?php echo $user['id']; ?></td>
                                <td><?php echo $user['first_name']; ?></td>
                                <td><?php echo $user['middle_name']; ?></td>
                				<td><?php echo $user['last_name']; ?></td>
                				<td><?php echo $user['username']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td><?php echo $user['contact']; ?></td>
                                <td><?php echo $user['gender']; ?></td>
                                <td><?php echo $user['address']; ?></td>
                                <td><?php echo $user['password']; ?></td>
                                <td><a class="btn btn-primary" role="button" href="<?=site_url('user/update/'.$user['id']);?>">Update</a> | <a class="btn btn-danger" role="button" href="<?=site_url('user/delete/'.$user['id']);?>">Delete</a>
                            </td>
                			 </tr>
                		<?php endforeach; ?>
                	</tbody>
                    </table>
                    <div class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?search=<?php echo htmlspecialchars($search); ?>&page=<?php echo $i; ?>" class="btn btn-sm btn-secondary"><?php echo $i; ?></a>
            <?php endfor; ?>
        </div>

                    <a href="<?=site_url('user/add');?>" class="btn btn-primary" role="button">Add New</a>
                </div>
            </div>
        </div>
        <main></main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
