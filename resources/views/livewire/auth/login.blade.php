<div>
    <a class="logo" id="desktop">
        <img src="{{asset(url('assets/img/logo.png'))}}" alt="burningroom">
    </a>
    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<a class="logo" id="mobile">
						<img src="{{asset(url('assets/img/logo.png'))}}" alt="burningroom">
					</a>
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-o3 text-white"><span>Log In </span><span>Register</span></h6>
						<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
						<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									
										<div class="center-wrap">
											<div class="section text-center">
												<a class="chat">
													<img src="{{asset(url('assets/img/logo2.png'))}}" alt="chat">
												</a>
												<h4 class="mb-4 pb-3 text-white">Log In</h4>
												<div class="form-group">
													<input type="text" class="form-style @error('username') is-invalid @enderror" placeholder="Username" autocomplete="nope" wire:model.defer="username">
													@error('username')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
													<i class="input-icon fas fa-user"></i>
												</div>	
												<div class="form-group mt-4">
													<input type="password" class="form-style @error('password') is-invalid @enderror" placeholder="Password" autocomplete="new-password" wire:model="password">
													@error('password')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
													<i class="input-icon uil uil-lock-alt"></i>
												</div>
												<div class="row mt-4">
													<div class="col-4"><hr></div>
													<div class="col-4">
														Or With
													</div>
													<div class="col-4"><hr></div>
												</div>
												<div class="row mt-4">
													<div class="col-4"></div>
													<div class="col-4">
														<a href="#">
															<img src="{{asset('assets/img/google.png')}}" class="img-thumbnail" style="position:initial !important;" width="30" height="30" alt="">
														</a>
													</div>
													<div class="col-4"></div>
												</div>
												<button type="button" class="btn btn-light-primary" style="margin-top:3rem !important" wire:click.prevent="login">Log In</button>
											</div>
										</div>
									
			      				</div>
								<div class="card-back">
									<div class="center-wrap">
										
											<div class="section text-center">
												<h4 class="mb-4 pb-3 text-white">Register</h4>
												<div class="form-group">
													<input type="text" class="form-style @error('full_name') is-invalid @enderror" placeholder="Nama lengkap" autocomplete="nope" value="{{ old('full_name') }}" wire:model.defer="full_name">
													@error('full_name')
														<span class="text-danger" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
													<i class="input-icon far fa-address-card"></i>
												</div>
												<div class="form-group mt-2 d-flex">
													@if ($avator)
														<div>
															<img src="{{ $avator->temporaryUrl() }}" class="img-thumbnail" style="border-radius: 50px; height:50px; width:50px;" alt="Preview">
														</div>
													@endif
													<label class="btn btn-primary">
														<i class="fa fa-image fs-3"></i> Upload Foto
														<input type="file" value="{{ old('avator') }}" class="form-style d-none @error('avator') is-invalid @enderror" autocomplete="nope" wire:model.defer="avator">
													</label>
													@error('avator')
														<span class="text-danger" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
													<!-- <i class="input-icon fas fa-file-upload"></i> -->
												</div>
												<div class="form-group mt-2">
													<input type="text" class="form-style @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" autocomplete="off" wire:model.defer="email">
													@error('email')
														<span class="text-danger" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
													<i class="input-icon fas fa-envelope"></i>
												</div>
												<div class="form-group mt-2">
													<input type="text" class="form-style @error('no_hp') is-invalid @enderror" placeholder="No Handphone" value="{{ old('no_hp') }}" autocomplete="off" wire:model.defer="no_hp">
													@error('no_hp')
														<span class="text-danger" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
													<i class="input-icon fas fa-phone" style="transform: rotate(100deg);"></i>
												</div>
												<div class="form-group mt-2">
													<input type="text" class="form-style @error('username') is-invalid @enderror" placeholder="Username" value="{{ old('username') }}" autocomplete="off" wire:model.defer="username">
													@error('username')
														<span class="text-danger" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
													<i class="input-icon fas fa-user"></i>
												</div>	
												<div class="form-group mt-2">
													<input type="password" class="form-style @error('password') is-invalid @enderror" placeholder="Password" autocomplete="new-password" wire:model="password">
													@error('password')
														<span class="text-danger" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
													<i class="input-icon uil uil-lock-alt"></i>
												</div>
												<button type="button" class="btn btn-light-primary" id="btn-register" style="margin-top:3rem !important" wire:click.prevent="signUp">Register</button>
											</div>
										
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
</div>
