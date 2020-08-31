<?php

function getLocalLang()
{
    return App()->getLocale() =="ar" ?"css-rtl":"css";
}
