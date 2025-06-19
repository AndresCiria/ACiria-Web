<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
includeTemplate('header', ['config' => $indexConfig]);
?>
	<!-- Contact -->

	<div class="contact">
		<div class="container">
			<div class="row">

				<!-- Contact Info -->

				<div class="col-lg-6 contact_col">
					<div class="contact_info">
						<div class="contact_title">Información de contacto</div>
						<div class="contact_info_list">
							<ul>
								<?php
								foreach ($contactos as $contacto) {
									generarContacto($contacto['tipo'], $contacto['dato'], $contacto['icono'], $contacto['enlace']);
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php includeTemplate('footer', ['config' => $indexConfig]);?>