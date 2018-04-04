<?
    $projectName = "Blago";
    $defaultUrl = "#";

    //Initialization of menu items array by creating of objects
    $menuItems = array(
        0 => new MenuItem("Home", $defaultUrl, "active"),
        1 => new MenuItem("About", "#about"),
        2 => new MenuItem("Contact", "#contact"),
        3 => new MenuItem("Dropdown", $defaultUrl, null, array(
            0 => new MenuItem("Action", $defaultUrl),
            1 => new MenuItem("Another action"),
            2 => new MenuItem("Something else here", $defaultUrl),
            3 => new MenuItem("Nav header", $defaultUrl, "dropdown-header"),
            4 => new MenuItem("Separated link", $defaultUrl)
        ))
    );

    //Example of class with custom getters
    class MenuItem {

        private $name, $url, $cssClass, $submenuItems;

        public function __construct($name, $url, $cssClass = null, $submenuItems = null) {
          $this->name = $name;
          $this->url = $url;
          $this->cssClass = $cssClass;
          $this->submenuItems = $submenuItems;
        }

        public function getCssClass(){
            return $this->cssClass;
        }

        public function getName(){
            return $this->name;
        }

        public function getURL(){
            return $this->url;
        }

        public function getSubmenuItems(){
            return $this->submenuItems;
        }
    }
?>

<header>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?= $projectName ?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">

            <?
                //Example of foreach and the rendering of object's properties 

                foreach($menuItems as $key=>$item):
                    $submenuItems = $item->getSubmenuItems();
                    if($submenuItems === null) {
                        echo "<li class=" . $item->getCssClass() . "><a href=" . $item->getURL() . ">" . $item->getName() . "</a></li>";
                    }
                    else 
                    {
                        echo "<li class=\"dropdown\">";
                        echo "<a href=\"" . $defaultUrl . "\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" " . 
                             "role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">" . $item->getName() . "<span class=\"caret\"></span></a>";
                        echo "<ul class=\"dropdown-menu\">";

                        $counter = 1;
                        foreach($submenuItems as $key=>$item): 
                            echo "<li class=" . $item->getCssClass() . "><a href=" . $item->getURL() . ">" . $item->getName() . "</a></li>";
                            if($counter % 3 == 0) {
                                echo "<li role=\"separator\" class=\"divider\"></li>";
                            }
                            $counter++;
                        endforeach;

                        echo "</li>";
                    }
                endforeach; 
            ?>

          </ul>
        </div>
      </div>
    </nav>
</header>