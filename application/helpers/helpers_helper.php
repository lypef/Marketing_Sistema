<?php
    function GetCategoriesLI ()
    {
        $c =& get_instance();
        $q = $c->db->get('categories');

        $r = '<ul>';
        foreach ($q->result() as $row)
        {
                $r .= '
                <li><a href="/index.php/all/view_category?id='.$row->id.'" target="_self">'.$row->name.'</a></li>
                ';
        }
        $r .= '</ul>';

        return $r;
    }

    function UrlActual ($url)
    {
        $url = substr($url,11);
        $find   = '?';
        $pos = strpos($url, $find);
        return htmlspecialchars(substr($url, 0, $pos), ENT_QUOTES, 'UTF-8');
    }

    function GetCategoriesSelect ()
    {
        $c =& get_instance();
        $q = $c->db->get('categories');

        $r = '
        <div class="form-group">
        <select class="form-control" id="category" name="category" required>
        <option value="">SELECCIONE CATEGORIA A LA QUE PERTENECE</option>
        ';
        foreach ($q->result() as $row)
        {
                $r .= '
                <option value="'.$row->id.'">'.$row->name.'</option>
                ';
        }
        $r .= '
        </select>
        </div>';

        return $r;
                            
    }
?>