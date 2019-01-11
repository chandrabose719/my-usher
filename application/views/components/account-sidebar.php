	<!-- Sidebar Part -->
	<aside class="main-sidebar custom-sidebar">
    	<div class="sidebar">
      		<div class="user-panel">
        		<a href="<?= base_url('account'); ?>">	
        			<div class="media">
					    <h4 class="my-1 mx-2 user-icon"><?= $usher_name[0]; ?></h4>
					    <div class="media-body">
					    	<h4>Welcome, </h4>
						    <h4><?= $usher_name; ?></h4>
					    </div>
					</div>
        		</a>
      		</div>
			<div class="mt-3 user-menu">
				<div class="list-group list-group-flush">
					<a class="list-group-item" href="<?= base_url('manufacturing-orders'); ?>">
						<img src="<?= base_url('assets/images/manufacturing_icon.png'); ?>" class="img-fluid" />
						&nbsp;Manufacturing Orders
					</a>
					<a class="list-group-item" href="<?= base_url('incomplete-orders'); ?>">
						<img src="<?= base_url('assets/images/manufacturing_icon.png'); ?>" class="img-fluid" />
						&nbsp;Incomplete Orders
					</a>
					<a class="list-group-item" href="<?= base_url('designing-orders'); ?>">
						<img src="<?= base_url('assets/images/design_icon.png'); ?>" class="img-fluid" />
						&nbsp;Designing Orders
					</a>
					<a class="list-group-item" href="<?= base_url('account-settings'); ?>">
						<img src="<?= base_url('assets/images/settings_icon.png'); ?>" class="img-fluid" />
						&nbsp;Settings
						<?php
							$array['user_id'] = $usher_id;
							$user_data = $this->Usher_m->get($array, TRUE);
							if (empty($user_data->billing_address) || empty($user_data->billing_city) || empty($user_data->billing_state) || empty($user_data->billing_zipcode)) {
								echo '
									<i class="fas fa-exclamation-circle text-warning float-right" data-toggle="tooltip" title="Pending"></i>
								';
							}
						?>	
					</a>
					<a class="list-group-item" href="<?= base_url('signout'); ?>">
						<img src="<?= base_url('assets/images/signout_icon.png'); ?>" class="img-fluid" />
						&nbsp;Logout
					</a>
				</div>	
			</div>
		</div>
	</aside>
	<!-- End Sidebar Part -->

