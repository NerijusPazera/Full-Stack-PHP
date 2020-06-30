<?php

namespace App\Abstracts\Views;

use Core\View;

/**
 * Class Content
 *
 * @package App\Abstracts\Views
 * @author  Dainius Vaičiulis   <denncath@gmail.com>
 */
abstract class Content extends View
{
    /**
     * Visi content'ų template'ai saugomi app/templates/content/*
     * Faktiškai kiekvienas page turės savo content'o template'ą,
     * bet kiekvienam iš jų kurt po atskirą View nėra prasmės.
     *
     * Šis metodas turi tiesiog sutrumpinti template'o path'o nurodymą,
     * pvz vietoj to, kad paduoti ROOT . '/app/templates/content/my-content.tpl.php'
     * į $template_path užtektų paduoti my-content.tpl.php
     *
     * @param string $template_path
     * @return mixed
     * @throws \Exception
     */
//    abstract public function render(string $template_path);
    /**
     *Šitą eilutę raudonins, kad negalima neabstraktaus metodo
     *padaryt abstrakčiu (dėl Core\View extendinimo, kuriame
     *jau yra render()).
     *
     *Todėl, iškart išsiextendinus šitą abstraktą, reikia užsikomentuoti
     *26 eilutę
     */
}
