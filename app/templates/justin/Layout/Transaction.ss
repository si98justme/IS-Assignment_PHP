<% include SideBar %>
<div class="content-container unit size3of4 lastUnit">
	<article>
		<h1>$Title</h1>
		<div class="content">$Content</div>
		
		<div class="content">
			<ul>
			<% loop $Accounts %>
			<li id="$ID">
				<a class="" href="">
					$Title
				</a>
				<span class="right">
					<span class="accountBallance">$AccountBalance</span><a href="" class="">Remove</a>
				</span>
			</li>
			<% end_loop %>
		</ul>

		<a href="" class="btn">Add new account</a>
			
		</div>
	</article>
		$Form
		$CommentsForm
</div>