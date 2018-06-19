<div id="menubar">
	<a href="/"><img src="css/creole.png" style="float:left; height:40px;padding:5px 10px;"></a>
		<form method="post" action="/galaxy">{{ csrf_field() }}<input type="text" style="color:black;" placeholder="語句を入力..." name="topic"><input style = "margin:10px;"class="btn btn-primary btn-sm" type="submit" value="つなげる">
		</form>

</div>