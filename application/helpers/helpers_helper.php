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
        $url = str_replace("/index.php/","",$url);
        
        $find   = '?';
        $pos = strpos($url, $find);

        if ($pos !== false) 
        {
            return htmlspecialchars(substr($url, 0, $pos), ENT_QUOTES, 'UTF-8');
        } else 
        {
            return htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
        }
    }

    function GetCategoriesSelect ()
    {
        $c =& get_instance();
        $q = $c->db->get('categories');

        $r = '
        <div class="form-group">
        <select class="form-control" id="category" name="category" required style="
            -moz-border-radius: 0px;
            -webkit-border-radius: 0px;
            border-radius: 0px;
            border: 1px solid #ccc;
            font-size: 16px;
            height: 50px;
        ">
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
    function GetCategoriesSelectID ($id)
    {
        $c =& get_instance();
        $q = $c->db->get('categories');

        $r = '
        <div class="form-group">
        <select class="form-control" id="category" name="category" required style="
            -moz-border-radius: 0px;
            -webkit-border-radius: 0px;
            border-radius: 0px;
            border: 1px solid #ccc;
            font-size: 16px;
            height: 50px;
        ">
        <option value="">SELECCIONE CATEGORIA A LA QUE PERTENECE</option>
        ';
        foreach ($q->result() as $row)
        {
                if ($row->id == $id)
                {
                    $r .= '
                    <option value="'.$row->id.'" selected>'.$row->name.'</option>
                    ';
                }else
                {
                    $r .= '
                    <option value="'.$row->id.'">'.$row->name.'</option>
                    ';
                }
                
        }
        $r .= '
        </select>
        </div>';

        return $r;
                            
    }
?>