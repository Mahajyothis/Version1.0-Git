<link rel="icon" type="image/png" href="<?php echo base_url(); ?>uploads/favicon.ico" />
<?php
$final_result="";
						foreach($result as $row) {
					
						$final_result .= '<a href="'.base_url().'basicprofile?uid='.$row->custID.'"><li class="row"><div class="padding-cls-search"><div class="col-md-2"><img src="'.base_url().'uploads/';
					if(!empty($row->photo)) $final_result.=$row->photo; else{ $final_result.='profile.png';}
						$final_result.='" class="img-responsive center-block"></div><div class="col-md-6 no-paddings-search align-desc-text"><span class="user-profile-name">'.$row->perdataFirstName.$row->perdataLastName.'</span><br><span class="user-profile-description">';
						if(strlen($row->profDesignation) > 30 ) $final_result .=substr($row->profDesignation, 0, 30).'...';
						else $final_result .=$row->profDesignation;
						
						$final_result .='</span><br><span class="user-profile-description">'.$row->addrCity.','.$row->addrState.'-'.$row->addrPostCode.'</span></div><div class="col-md-1 no-paddings-search follow-btn-search"><button class="btn btn-warning view">'.$lang['view'].'</button></div></div></li></a>
						'; 
					
						}
						
		$final_result.='<a href="'.base_url().'searching?cat=Article&q='.$name.'" ><li  class="row">
				<div class="padding-cls-search">
						<div class="col-md-11">
							<p class="article-search-list"> '.$lang['search'].' '.$name.' in <strong>'.$lang['articles'].'</strong></p>
						</div>
				</div>
			       </li></a>
			      <a href="'.base_url().'searching/blogs?cat=blogs&q='.$name.'" ><li  class="row">
				<div class="padding-cls-search">
						<div class="col-md-11">
							<p class="article-search-list">'.$lang['search'].' '.$name.' in <strong>'.$lang['blogs'].'</strong></p>
						</div>
				</div>
			     </li></a>
			    <a href="'.base_url().'searching?cat=forum&q='.$name.'" ><li  class="row">
				<div class="padding-cls-search">
						<div class="col-md-11">
							<p class="article-search-list">'.$lang['search'].' '.$name.' in <strong>'.$lang['forum'].'</strong></p>
						</div>
				</div>
			   </li></a>
			  <a href="'.base_url().'searching?cat=discussion&q='.$name.'" ><li  class="row">
				<div class="padding-cls-search">
						<div class="col-md-11">
							<p class="article-search-list">'.$lang['search'].' '.$name.' in <strong>'.$lang['discussions'].'</strong></p>
						</div>
				</div>
			  </li></a>
			  <a href="'.base_url().'searching?cat=events&q='.$name.'" ><li  class="row">
				<div class="padding-cls-search">
						<div class="col-md-11">
							<p class="article-search-list">'.$lang['search'].' '.$name.' in <strong>'.$lang['events'].'</strong></p>
						</div>
				</div>
			  </li></a>
			 <a href="'.base_url().'searching?cat=group&q='.$name.'" ><li  class="row">
				<div class="padding-cls-search">
						<div class="col-md-11">
							<p class="article-search-list">'.$lang['search'].'  '.$name.' in <strong>'.$lang['groups'].'</strong></p>
						</div>
				</div>
			</li></a>';
		$final_result.='<a href="'.base_url().'searching/allsearch?cat=all&q='.$name.'">
			<li  class="row">
			
						<div class="show-more-search">
							<span>'.$lang['show_more_results'].' '.$name.'</span>
						</div>
				
			</li>
		</a>';
				
						echo $final_result;
						Exit;