<?php defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' ); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon"  href="<?php echo base_url(); ?>assets/img/logo.png" type="image/x-icon">
	<!-- Header and head section -->
	<?php require_once 'parts/header.php'; ?>
	<script type="text/javascript">
		var BASE_URL = "<?php echo base_url(); ?>";
	</script>
</head>
<body class="hold-transition login-page">

		{{CONTENT}}

<!-- ./wrapper -->
</body>
</html>
