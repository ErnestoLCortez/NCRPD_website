		{if:label} 	<label for='%%id%%' class='mbcolor'>%%label%%</label> {/if:label}

	<div class="input mbcolor %%name%%"  {if:conditional}data-show="%%conditional%%"{/if:conditional}>

		<input type="text" name="%%name%%" id="%%id%%" class="color-field" value="%%value%%">
		{if:copycolor} <div class="arrows %%copypos%%" data-id="%%id%%" data-bind="%%bindto%%"><div class='right'><span class='arrow-right' title='%%right_title%%'></div><div class='left'><span class='arrow-left' title='%%left_title%%'></div></div>	{/if:copycolor} 
	</div>