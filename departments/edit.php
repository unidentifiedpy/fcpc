<?php
	require "../requires.php";

	$id = $_GET[ "id" ];
	$data = $con->query( "select * from departments where did=$id" )->fetch_assoc();

	if( $_POST ) {
		$id = $_POST[ "id" ];
		$desc = $_POST[ "desc" ];

		$query = "
			update departments
				set
					ddesc=\"$desc\"
				where
					did=$id
		";

		if( $con->query( $query ) )
			header( "Location: /departments" );
	}
?>

<main class="page contact-page">
    <section class="portfolio-block contact">
        <div class="container">
            <div class="heading">
                <h2>FCPC IRIS</h2>
                <h3>Edit Department</h3>
                <form method="POST" enctype="multipart/form-data">
                	<input type="hidden" name="id" value="<?= $data[ "did" ] ?>">
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <input class="form-control item" type="text" id="desc" name="desc" value="<?= $data[ "ddesc" ] ?>">
                    </div>                
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-block btn-lg" value="Edit">
					</div>
				</form>
            </div>
        </div>
    </section>
</main>

<?php require "../footers/footer.php"; ?>