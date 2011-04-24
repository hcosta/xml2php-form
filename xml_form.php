<?php
/**
 * Xml-Form (clase xml_form) :)
 *
 * Genera diferentes formularios con PHP para editar archivos xml
 *
 * @author Hector Costa Guzman [hektor111]
 * @author http://www.hcosta.info
 * @version 1.0
 * @package xml_form 
 */
class xml_form 
{
	/**
	 * contiene la ruta del archivo xml
	 * @var file 
	 * @access private
	 */
	private $file;
	private $title;
	
	function __construct($file, $title)
	{
        $this->file= $file;
        $this->title= $title;
   	}
   	
   	function form()
   	{
	   	if ($_POST['id_xml'] != "") //algo pa comprovar que se esta llamando a ese formulario y no a otro :)
		{
			$xml = simplexml_load_file($this->file);
			$i = 0;
			if (isset($_POST['0']))
			{
				foreach ($xml->children() as $child) 
				{ 
					if ($i == $_POST['id_xml']) 
					{
						foreach ($child->children() as $new)
						{
							if (isset($_POST[''.$new->getName().''])) 
								$new[0] = $_POST[''.$new->getName().''];		
						}	
					}
					$i++;
				} 
				$xml->asXML($this->file);
				echo 'Edited :-)<br><br><button onclick="history.back(); ">Go back</button>';
			}
			else
			{
				echo '<form name="xml" action="" method="POST"><table>';
				foreach ($xml->children() as $child) 
				{ 
					if ($i == $_POST['id_xml']) 
					{
						//var_dump($child);
						foreach ($child->children() as $new)
						{
							echo '<tr><td>'.$new->getName().'</td><td><input size="50%" name="'.$new->getName().'" type="text" value="'.$new.'"/><input type="hidden" name="id_xml" value="'.$i.'" /></tr>';
							$j++;
						}
					}			
					$i++;
				} 
				echo '</table><br><input type="hidden" name="0" value="1" /><input type="submit"/>';
				//echo '<button onclick="history.back(); ">Go back</button>';
				echo '</form>';
			}
		}
		else 
		{
			$id_xml = 0;
			$xml = simplexml_load_file($this->file);
			echo '<form name="xml" action="" method="POST">';
			 
			echo '<select name = "id_xml">';
			
			foreach ($xml->children() as $child) 
			{ 
				$title = $this->title;
				echo "\n\r<option value='$id_xml' style='width: 500px;'>".$child->$title."</option>"; 
				$id_xml++;
			} 
			echo '</select>';
			echo '<br><br><input type="submit"/>';
			echo '</form>'; 
		}
   	}
   	
}