<?php

echo <<<HTML
<!DOCTYPE html>
<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>{$title}</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
<style>
      .material-symbols-outlined {
        font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24;
      }
    </style>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              primary: "#13ec5b",
              "background-light": "#f6f8f6",
              "background-dark": "#102216",
              "surface-dark": "#193322",
              "border-dark": "#326744",
              "text-main-dark": "#ffffff",
              "text-secondary-dark": "#92c9a4",
              "text-main-light": "#102216",
              "text-secondary-light": "#5a7864",
              "surface-light": "#e8ede9",
              "border-light": "#d1d9d3",
            },
            fontFamily: {
              display: ["Manrope", "sans-serif"],
            },
            borderRadius: {
              DEFAULT: "0.5rem",
              lg: "1rem",
              xl: "1.5rem",
              full: "9999px",
            },
          },
        },
      };
    </script>
</head>
HTML;