<?php
    
    function GetCategoriesFilters ($id_select)
    {
        $c =& get_instance();
        $q = $c->db->get('categories');

        $r = '
        <div class="portfolio-section os-animation post" data-os-animation="animated-portfolio-section">
            <div id="filters" class="button-group postname-categories">
        ';
        if ($id_select == 0)
        {
            $r .= '
                <a href="/index.php/all/view_category?id=0&pag=1"><button class="button is-checked">Todos</button></a>
            ';
        }else
        {
            $r .= '
                <a href="/index.php/all/view_category?id=0&pag=1"><button class="button">Todos</button></a>
            ';
        }
        
        foreach ($q->result() as $row)
        {
                if ($id_select == $row->id)
                {
                    $r .= '
                        <a href="/index.php/all/view_category?id='.$row->id.'&pag=1"><button class="button is-checked">'.$row->name.'</button></a>
                    ';
                }else
                {
                    $r .= '
                        <a href="/index.php/all/view_category?id='.$row->id.'&pag=1"><button class="button">'.$row->name.'</button></a>
                    ';
                }
        }
        $r .= '
            </div>
        </div>
        ';

        return $r;
    }

    function GetCategoriesFiltersPremium ($id_select)
    {
        $c =& get_instance();
        $q = $c->db->get('categories');

        $r = '
        <div class="portfolio-section os-animation post" data-os-animation="animated-portfolio-section">
            <div id="filters" class="button-group postname-categories">
        ';
        if ($id_select == 0)
        {
            $r .= '
                <a href="/index.php/all/view_category_premium?id=0&pag=1"><button class="button is-checked">Todos</button></a>
            ';
        }else
        {
            $r .= '
                <a href="/index.php/all/view_category_premium?id=0&pag=1"><button class="button">Todos</button></a>
            ';
        }
        
        foreach ($q->result() as $row)
        {
                if ($id_select == $row->id)
                {
                    $r .= '
                        <a href="/index.php/all/view_category_premium?id='.$row->id.'&pag=1"><button class="button is-checked">'.$row->name.'</button></a>
                    ';
                }else
                {
                    $r .= '
                        <a href="/index.php/all/view_category_premium?id='.$row->id.'&pag=1"><button class="button">'.$row->name.'</button></a>
                    ';
                }
        }
        $r .= '
            </div>
        </div>
        ';

        return $r;
    }
    
    function GetCategoriesLI ()
    {
        $c =& get_instance();
        $q = $c->db->get('categories');

        $r = '
        <ul>
        <li><a href="/index.php/all/view_category?id=0&pag=1" target="_self">Todas</a></li>
        ';
        foreach ($q->result() as $row)
        {
                $r .= '
                <li><a href="/index.php/all/view_category?id='.$row->id.'&pag=1" target="_self">'.$row->name.'</a></li>
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
            $tmp = htmlspecialchars(substr($url, 0, $pos), ENT_QUOTES, 'UTF-8');
            $tmp = base_url() . $tmp;
            return $tmp;
        } else 
        {
            $tmp = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
            $tmp = base_url() . $tmp;
            return $tmp;
        }
    }

    function GetClientsSelect ()
    {
        $c =& get_instance();
        $q = $c->db->query('select * from clients order by empresa asc');

        $r = '
        <div class="form-group">
        <select class="form-control" id="client" name="client" required style="
            -moz-border-radius: 0px;
            -webkit-border-radius: 0px;
            border-radius: 0px;
            border: 1px solid #ccc;
            font-size: 16px;
            height: 50px;
        ">
        <option value="">SELECCIONE CLIENTE PROPIETARIO DE PROMOCION</option>
        ';
        foreach ($q->result() as $row)
        {
                $r .= '
                <option value="'.$row->id.'">'.$row->empresa.'</option>
                ';
        }
        $r .= '
        </select>
        </div>';

        return $r;
                            
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

    function GetPromotionsSelectID ($id)
    {
        $c =& get_instance();
        $q = $c->db->get('clients');

        $r = '
        <div class="form-group">
        <select class="form-control" id="client" name="client" required style="
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
                    <option value="'.$row->id.'" selected>'.$row->empresa.'</option>
                    ';
                }else
                {
                    $r .= '
                    <option value="'.$row->id.'">'.$row->empresa.'</option>
                    ';
                }
                
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

    function LoginCheck ()
    {
        $CI = & get_instance();
        
        if (!$CI->session->userdata('username'))
        {
            redirect ('/');
        }
    }

    function LoginCheckBool ()
    {
        $CI = & get_instance();
        
        if (!$CI->session->userdata('username'))
        {
            return false;
        }else
        {
            return true;
        }
    }

    function NameEmpresaID ($id)
    {
        $c =& get_instance();
        return $c->db->query('SELECT empresa FROM clients WHERE id = '.$id.' ')->row()->empresa;
    }

    function ImgSelectMagazine ($id)
    {
        if ($id > 0)
        {
            $c =& get_instance();
            $item = $c->db->query('SELECT * FROM `magazine` WHERE id = '.$id.' ')->row();

            return '
            <div class="row">
                <div class="col-sm-6">
                    <a class="venobox" data-gall="myGallery" href="'.$item->url_img.'" title="'.$item->nombre.' - EDICION: #'. $item->numero .' - PUBLICADO EL: '.$item->f_publicacion.'">
                        <center>
                            <span><strong>'.$item->nombre.' - EDICION: #'. $item->numero .' - PUBLICADO EL: '.$item->f_publicacion.'</strong></span>
                            <img src="'.$item->url_img.'" class="imagen_principal img-thumbnail" width="100%" alt="Edicion '.$item->numero.'">
                        </center>
                    </a>
                </div>
                <div class="col-sm-6">
                    <div class="fb-comments" data-href="'.base_url().'All/magazine/img_num/'.$item->id.'" data-numposts="6" order_by="reverse_time"></div>    
                </div>
            </div>
            <br><br>
            <hr>
            ';
        }
        else
        {
            return '';
        }
        
    }

    function ImgSelectC_zacatecas ($id)
    {
        if ($id > 0)
        {
            $c =& get_instance();
            $item = $c->db->query('SELECT * FROM `c_zacatecas` WHERE id = '.$id.' ')->row();

            return '
            <div class="row">
                <div class="col-sm-6">
                    <a class="venobox" data-gall="myGallery" href="'.$item->url.'" title="'.$item->name.'">
                        <center>
                            <span><strong>'.$item->name.'</strong></span>
                            <br><img src="'.$item->url.'" class="imagen_principal img-thumbnail" width="100%" alt="'.$item->text.'">
                        </center></a>
                        <br><div class="text-justify">'.$item->text.'</div>
                </div>
                <div class="col-sm-6">
                    <div class="fb-comments" data-href="'.base_url().'All/c_zacatecas/img_num/'.$item->id.'" data-numposts="6" order_by="reverse_time"></div>    
                </div>
            </div>
            <br><br>
            <hr>
            ';
        }
        else
        {
            return '';
        }
        
    }
?>