<div class="container mt-5">

	<div class="d-flex justify-content-center">
		<h3 class="font-weight-bold text-center">Ideas</h3>
   		 <button class="btn btn-outline-dark ml-3" id="idea_container"> <i class="fa fa-lightbulb-o" aria-hidden="true"></i>+</button> &nbsp;&nbsp;
	</div><hr>

	<div id="idea_add" class="mt-5">
		<div id="idea_status" class="ml-3 mr-3"></div>
		<form method="POST" action="">
			<input list="brow" class="form-control mb-3 sector-input" placeholder="- Select idea Industory/Sector -">
			<datalist id="brow">
				<option value="Accountants"></option>
				<option value="Advertising/Public Relations"></option>
				<option value="Aerospace, Defense Contractors"></option>
				<option value="Agribusiness"></option>
				<option value="Agricultural Services & Products"></option>
				<option value="Agriculture"></option>
				<option value="Air Transport"></option>
				<option value="Air Transport Unions"></option>
				<option value="Airlines"></option>
				<option value="Alcoholic Beverages"></option>
				<option value="Alternative Energy Production & Services"></option>
				<option value="Architectural Services"></option>
				<option value="Attorneys/Law Firms"></option>
				<option value="Auto Manufacturers"></option>
				<option value="Banking, Mortgage"></option>
				<option value="Banks, Commercial"></option>
				<option value="Banks, Savings & Loans"></option>
				<option value="Bars & Restaurants"></option>
				<option value="Beer, Wine & Liquor"></option>
				<option value="Books, Magazines & Newspapers"></option>
				<option value="Broadcasters, Radio/TV"></option>
				<option value="Builders/General Contractors"></option>
				<option value="Builders/Residential"></option>
				<option value="Building Materials & Equipment"></option>
				<option value="Building Trade Unions"></option>
				<option value="Business Associations"></option>
				<option value="Business Services"></option>
				<option value="Cable & Satellite TV Production & Distribution"></option>
				<option value="Candidate Committees"></option>
				<option value="Candidate Committees, Democratic"></option>
				<option value="Candidate Committees, Republican"></option>
				<option value="Car Dealers"></option>
				<option value="Car Dealers, Imports"></option>
				<option value="Car Manufacturers"></option>
				<option value="Casinos / Gambling"></option>
				<option value="Cattle Ranchers/Livestock"></option>
				<option value="Chemical & Related Manufacturing"></option>
				<option value="Chiropractors"></option>
				<option value="Civil Servants/Public Officials"></option>
				<option value="Clergy & Religious Organizations"></option>
				<option value="Clothing Manufacturing"></option>
				<option value="Coal Mining"></option>
				<option value="Colleges, Universities & Schools"></option>
				<option value="Commercial Banks"></option>
				<option value="Commercial TV & Radio Stations"></option>
				<option value="Communications/Electronics"></option>
				<option value="Computer Software"></option>
				<option value="Conservative/Republican"></option>
				<option value="Construction"></option>
				<option value="Construction Services"></option>
				<option value="Construction Unions"></option>
				<option value="Credit Unions"></option>
				<option value="Crop Production & Basic Processing"></option>
				<option value="Cruise Lines"></option>
				<option value="Cruise Ships & Lines"></option>
				<option value="Dairy"></option>
				<option value="Defense"></option>
				<option value="Defense Aerospace"></option>
				<option value="Defense Electronics"></option>
				<option value="Defense/Foreign Policy Advocates"></option>
				<option value="Democratic Candidate Committees"></option>
				<option value="Democratic Leadership PACs"></option>
				<option value="Democratic/Liberal"></option>
				<option value="Dentists"></option>
				<option value="Doctors & Other Health Professionals"></option>
				<option value="Drug Manufacturers"></option>
				<option value="Education"></option>
				<option value="Electric Utilities"></option>
				<option value="Electronics Manufacturing & Equipment"></option>
				<option value="Electronics, Defense Contractors"></option>
				<option value="Energy & Natural Resources"></option>
				<option value="Entertainment Industry"></option>
				<option value="Environment"></option>
				<option value="Farm Bureaus"></option>
				<option value="Farming"></option>
				<option value="Finance / Credit Companies"></option>
				<option value="Finance, Insurance & Real Estate"></option>
				<option value="Food & Beverage"></option>
				<option value="Food Processing & Sales"></option>
				<option value="Food Products Manufacturing"></option>
				<option value="Food Stores"></option>
				<option value="For-profit Education"></option>
				<option value="For-profit Prisons"></option>
				<option value="Foreign & Defense Policy"></option>
				<option value="Forestry & Forest Products"></option>
				<option value="Foundations, Philanthropists & Non-Profits"></option>
				<option value="Funeral Services"></option>
				<option value="Gambling & Casinos"></option>
				<option value="Gambling, Indian Casinos"></option>
				<option value="Garbage Collection/Waste Management"></option>
				<option value="Gas & Oil"></option>
				<option value="Gay & Lesbian Rights & Issues"></option>
				<option value="General Contractors"></option>
				<option value="Government Employee Unions"></option>
				<option value="Government Employees"></option>
				<option value="Health"></option>
				<option value="Health Professionals"></option>
				<option value="Health Services/HMOs"></option>
				<option value="Hedge Funds"></option>
				<option value="HMOs & Health Care Services"></option>
				<option value="Home Builders"></option>
				<option value="Hospitals & Nursing Homes"></option>
				<option value="Hotels, Motels & Tourism"></option>
				<option value="Human Rights"></option>
				<option value="Ideological/Single-Issue"></option>
				<option value="Industrial Unions"></option>
				<option value="Insurance"></option>
				<option value="Internet"></option>
				<option value="Labor"></option>
				<option value="Lawyers & Lobbyists"></option>
				<option value="Lawyers / Law Firms"></option>
				<option value="Leadership PACs"></option>
				<option value="Liberal/Democratic"></option>
				<option value="Liquor, Wine & Beer"></option>
				<option value="Livestock"></option>
				<option value="Lobbyists"></option>
				<option value="Lodging / Tourism"></option>
				<option value="Logging, Timber & Paper Mills"></option>
				<option value="Manufacturing, Misc"></option>
				<option value="Marine Transport"></option>
				<option value="Meat processing & products"></option>
				<option value="Medical Supplies"></option>
				<option value="Mining"></option>
				<option value="Misc Business"></option>
				<option value="Misc Finance"></option>
				<option value="Misc Manufacturing & Distributing"></option>
				<option value="Misc Unions"></option>
				<option value="Miscellaneous Defense"></option>
				<option value="Miscellaneous Services"></option>
				<option value="Mortgage Bankers & Brokers"></option>
				<option value="Motion Picture Production & Distribution"></option>
				<option value="Music Production"></option>
				<option value="Natural Gas Pipelines"></option>
				<option value="Newspaper, Magazine & Book Publishing"></option>
				<option value="Non-profits, Foundations & Philanthropists"></option>
				<option value="Nurses"></option>
				<option value="Nursing Homes/Hospitals"></option>
				<option value="Nutritional & Dietary Supplements"></option>
				<option value="Oil & Gas"></option>
				<option value="Other"></option>
				<option value="Payday Lenders"></option>
				<option value="Pharmaceutical Manufacturing"></option>
				<option value="Pharmaceuticals / Health Products"></option>
				<option value="Phone Companies"></option>
				<option value="Physicians & Other Health Professionals"></option>
				<option value="Postal Unions"></option>
				<option value="Poultry & Eggs"></option>
				<option value="Power Utilities"></option>
				<option value="Printing & Publishing"></option>
				<option value="Private Equity & Investment Firms"></option>
				<option value="Professional Sports, Sports Arenas & Related Equipment & Services"></option>
				<option value="Progressive/Democratic"></option>
				<option value="Public Employees"></option>
				<option value="Public Sector Unions"></option>
				<option value="Publishing & Printing"></option>
				<option value="Radio/TV Stations"></option>
				<option value="Railroads"></option>
				<option value="Real Estate"></option>
				<option value="Record Companies/Singers"></option>
				<option value="Recorded Music & Music Production"></option>
				<option value="Recreation / Live Entertainment"></option>
				<option value="Religious Organizations/Clergy"></option>
				<option value="Residential Construction"></option>
				<option value="Restaurants & Drinking Establishments"></option>
				<option value="Retail Sales"></option>
				<option value="Savings & Loans"></option>
				<option value="Schools/Education"></option>
				<option value="Sea Transport"></option>
				<option value="Securities & Investment"></option>
				<option value="Special Trade Contractors"></option>
				<option value="Sports, Professional"></option>
				<option value="Steel Production"></option>
				<option value="Stock Brokers/Investment Industry"></option>
				<option value="Student Loan Companies"></option>
				<option value="Sugar Cane & Sugar Beets"></option>
				<option value="Teachers Unions"></option>
				<option value="Teachers/Education"></option>
				<option value="Telecom Services & Equipment"></option>
				<option value="Telephone Utilities"></option>
				<option value="Textiles"></option>
				<option value="Timber, Logging & Paper Mills"></option>
				<option value="Tobacco"></option>
				<option value="Transportation"></option>
				<option value="Transportation Unions"></option>
				<option value="Trash Collection/Waste Management"></option>
				<option value="Trucking"></option>
				<option value="TV / Movies / Music"></option>
				<option value="TV Production"></option>
				<option value="Unions"></option>
				<option value="Unions, Airline"></option>
				<option value="Unions, Building Trades"></option>
				<option value="Unions, Industrial"></option>
				<option value="Unions, Misc"></option>
				<option value="Unions, Public Sector"></option>
				<option value="Unions, Teacher"></option>
				<option value="Unions, Transportation"></option>
				<option value="Universities, Colleges & Schools"></option>
				<option value="Vegetables & Fruits"></option>
				<option value="Venture Capital"></option>
				<option value="Waste Management"></option>
				<option value="Wine, Beer & Liquor"></option>
				<option value="Women's Issues"></option>
			</datalist> 
			<input type="hidden" id="client_id" value="<?php print($_GET['client_id']); ?>">
			<input type="name" id="idea_name" placeholder="Idea name" class="form-control mb-3">
			<input type="name" id="idea_trademark" placeholder="Idea trademark (Strickly copied from the idea summary)" class="form-control mb-3">
			<label class="mb-3 font-italic text-danger">Nature of idea(<span id="nature-char-left">2000 Characters</span>)</label>
			<textarea style="height: 150px; resize: none;" class="form-control" id="idea_nature" maxlength="2000" placeholder="Idea nature"></textarea>
			<label class="mb-3 font-italic text-danger">Target market(<span id="market-char-left">1000 Characters</span>)</label>
			<textarea style="height: 150px; resize: none;" class="form-control" id="idea_target_market" maxlength="1000" placeholder="Idea target market"></textarea>
			<div class="mt-3">
				<button type="submit" class="btn btn-primary float-right" id="register_idea">Save <i class="fa fa-save"></i></button>
			</div>

		</form>
	</div>
	
	<div class="container">
		<?php
			$ideas = $work->get_ideas($_GET['client_id']);
			$count = 0;
			if(count($ideas) > 0)
			{
				print("<div class='mt-5 mb-5 h3 text-center'>List of ideas</div>");
			?>
			<div class="row">
			<?php
				foreach($ideas as $idea)
				{
		?>
				<div class="col-6 mb-4">
					<div class="card border-success mb-3" style="max-width: 540px;">
					  <div class="row no-gutters">
					    <div class="col-md-8">
					      <div class="card-body">
					        <h5 class="card-title">Idea <?php print($idea['idea_code']);?></h5>
					        <p class="card-text"><?php print("Idea name: ".$idea['idea_name']."<br> Idea trademark: ". $idea['idea_trademark']);?></p>
					        <p class="card-text"><small class="text-muted"><?php print($idea['idea_date']);?></small></p>

					        <form method="POST" action="">
					        	<input type="hidden" id="idea_name<?php print($idea['idea_id']);?>" value="<?php print($idea['idea_name']);?>">

					        </form>
					        <button class="btn btn-outline-success" data-toggle="modal" data-target="#more-info-idea<?php print($idea['idea_id']);?>">more info</button>
							<div class="modal fade" id="more-info-idea<?php print($idea['idea_id']);?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
							  aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
								      <div class="modal-header text-center">
								        <h4 class="modal-title w-100 font-weight-bold">Idea: <?php print($idea['idea_code']);?> </h4>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div id="cs_status" class="ml-4 mr-4 mt-2 mb-2">

								      </div>
								      <div class="modal-body mx-3">

								        <div class="md-form mb-3 border text-disable">
								          <label data-error="wrong" data-success="right" for="fname">Idea code</label>
								          <div>
								          	<?php print($idea['idea_code']);?>
								          </div>
								        </div>

								      	<div id="view_idea<?php print($idea['idea_id']);?>">
									        <div class="md-form mb-3">
												<label data-error="wrong" data-success="right" for="lname">Idea name</label>
												<div>
													<?php print($idea['idea_name']);?>
												</div><hr>
									        </div>

									        <div class="md-form mb-3">
												<label data-error="wrong" data-success="right" for="idea_trademark">Idea trademark</label>
												<div>
													<?php print($idea['idea_trademark']);?>
												</div><hr>
									        </div>

									        <div class="md-form mb-3">
												<label data-error="wrong" data-success="right" for="lname">Idea target market
												</label>
												<div>
													<?php print($idea['idea_target_market']);?>
												</div><hr>
									        </div>
									        <div class="md-form mb-3">
												<label data-error="wrong" data-success="right" for="lname">Idea nature</label>
												<div>
													<?php print($idea['idea_nature']);?>
												</div><hr>
									        </div>

											<div class="modal-footer d-flex justify-content-center">
												<button class="btn btn-info" onclick="idea_edit(<?php print($idea['idea_id']);?>);">Edit</button>
											</div>
								      	</div>

								      	<div id="edit_idea<?php print($idea['idea_id']);?>" class="w3-hide">
								      		<div id="idea_status<?php print($idea['idea_id']);?>"></div>
									        <div class="md-form mb-3">
												<div id="">
													<input type="name" id="idea_name_<?php print($idea['idea_id']);?>" class="form-control validate" value="<?php print($idea['idea_name']);?>">
												</div>
												<label data-error="wrong" data-success="right" for="lname">Idea name</label>
									        </div>

									        <div class="md-form mb-3">
												<div id="">
													<input type="name" id="idea_trademark<?php print($idea['idea_id']);?>" class="form-control validate" value="<?php print($idea['idea_trademark']);?>">
												</div>
												<label data-error="wrong" data-success="right" for="idea_trademark">Idea trademark</label>
									        </div>

									        <div class="md-form mb-3">
									        	<div>
										        	<textarea id="idea_target_market<?php print($idea['idea_id']);?>" style="height: 70px; resize: none;" class="form-control">
										        		<?php print($idea['idea_target_market']);?>
										        	</textarea>
									        	</div>
												<label data-error="wrong" data-success="right" for="lname">Idea target market
												</label>
									        </div>

									        <div class="md-form mb-3">
									        		<div>
														<textarea id="idea_nature<?php print($idea['idea_id']);?>" style="height: 70px; resize: none;" class="form-control">
														<?php print($idea['idea_nature']);?>
														</textarea>
									        		</div>
													<label data-error="wrong" data-success="right" for="lname">Idea nature</label>
									        </div>
											<div class="modal-footer d-flex justify-content-center">
												<button class=" btn btn-danger" onclick="cancel_idea_edit(<?php print($idea['idea_id']);?>);">cancel</button>
												<button class="btn btn-success" onclick="edit_idea_save(<?php print($idea['idea_id']);?>);">Save <i class="fa fa-save"></i></button>
											</div>

								      	</div>

								      </div>
							    </div>
							  </div>
							</div>
				        <?php
				        	if($u_details['w_type'] == "CEO")
				        	{
				        ?>
				        <a class="btn btn-outline-dark" href="../generate_certificate.php?idea_g_id=<?php print($idea['idea_id']);?>" target="_blank">Gerate certificate</a>
				        <?php
				        	}
				        ?>

				      </div>
				    </div>
				  </div>
				</div>
			</div>

		<?php
				}
		?>
		</div>
		<?php
			}
		?>
	</div>
</div>
