<?php

return function ($site) {
    return $site->grandchildren()->template('shipping');
};