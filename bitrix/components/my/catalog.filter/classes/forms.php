<?
	class forms
	{
		static function StringArrayASort($values)
		{
			$values_enum = array();
			foreach ($values as $vol) {
				$values_enum[] = (int)$vol;
			}
			asort($values_enum);
			foreach ($values_enum as $vol) {
				$result[] = $vol;
			}
			return $result;
		}

		static function select($values, $name, $title, $ed_izm = null)
		{

			$str = "<h3><span>{$title}</span></h3>";
			$str .= "<select name='{$name}'>
			   <option value=''>Все</option>
			";
			foreach ($values as $item) {
				$selected = $_REQUEST[$name] == $item ? "selected='selected'" : '';
				$str .= "<option {$selected} value='{$item}'>{$item}</option>";
			}

			$str .= "</select>";
			return $str;
		}

		static function interval($values, $name, $title, $ed_izm = null)
		{
			$values_enum = self::StringArrayASort($values);
			$min         = $values_enum[0];
			$max         = $values_enum[count($values_enum) - 1];
			$str         = "
			<h3><span>" . $title . "</span></h3>
			<script type='text/javascript'>
			$(function(){
			$('#slider_{$name}').slider({
			    min: " . $min . ",
			    max: " . $max . ",
			    values: [" . $min . "," . $max . "],
			    range: true,

			        slide: function(event, ui){
			            $('input#minCost_{$name}').val($('#slider_{$name}').slider('values',0));
			            $('input#maxCost_{$name}').val($('#slider_{$name}').slider('values',1));
			            if (ui.values[0]=={$min}) $('input#minCost_{$name}').val('');
			            if (ui.values[1]=={$max}) $('input#maxCost_{$name}').val('');

			        }
			});
			});
			</script>


			";
			$str .= "
			<div class='formCost'>
			
			от<input name='min_{$name}' type='text' id='minCost_{$name}' value='".$_REQUEST['min_'.$name]."'/>
			до<input name='max_{$name}' type='text' id='maxCost_{$name}' value='".$_REQUEST['max_'.$name]."'/>" . $ed_izm . "
			</div>
			<div class='sliderCont'>
			<div id='slider_{$name}'></div>
			</div>
			";
			return $str;

		}


		static function checkbox($values, $name, $title, $ed_izm = null)
		{
			$str = "<h3><span>" . $title . "</span></h3>";
			foreach ($values as $items) {
				$sel = in_array($items, $_REQUEST[$name]) ? "checked = 'checked'" : '';
				$str .= "<div class='node'>
				<input {$sel} name = '{$name}[]' type='checkbox' value='{$items}'>{$items}</div>";

			}
			;

			return $str;
		}
	}
