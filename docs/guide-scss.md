# Guide SCSS
Some patterns, tips and tricks about the SASS.

## Sizings
Use the keys: xs, sm, md, lg, xl, etc; to define differents sizes. This can be also used to
breakpoints, borders, and others properties. This is our conventions.

```scss
// Breakpoints
$grid-breakpoints: (
  xs: 0,
  sm: 576px,
  md: 768px,
  lg: 992px,
  xl: 1200px,
  xxl: 1400px
);


// Containers
$container-max-widths: (
  sm: 540px,
  md: 720px,
  lg: 960px,
  xl: 1140px,
  xxl: 1320px
);

// etc
```
