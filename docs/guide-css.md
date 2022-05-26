# Guide CSS/SCSS
A base deste styleguide foi inspirada no [Airbnb Styleguide](https://github.com/airbnb/css) e no [Sass-guideline](https://sass-guidelin.es/). A partir daí teremos o nosso modelo a medida que houver necessidade.

1. [Terminologia](#terminologia)
    - [Regras](#regras)
    - [Seletores](#seletores)
    - [Propriedades](#propriedades)
1. [CSS](#css)
    - [Formato](#formato)
    - [Comentários](#comentarios)
    - [OOCSS e BEM](#oocss-e-bem)
    - [Seletores ID](#seletores-id)
    - [JavaScript hooks](#javascript-hooks)
    - [Border](#border)
1. [Sass](#sass)
    - [Sintaxe](#sintaxe)
    - [Ordenação](#ordenacao-de-declaracao-de-propriedades)
    - [Variáveis](#variaveis)
    - [Mixins](#mixins)
    - [Extend](#extend)
    - [Seletores agrupados](#seletores-agrupados)
## Terminologia
### Declaração de regras
Uma declaração é o nome dado ao seletor (ou grupo de seletores) que vem acompanhado de um grupo de propriedades.

```css
.post-content {
  color: #999;
  font-size: 14px;
  line-height: 1.2;
}
```

### Seletores
Em uma declaração, os *seletores* são os identificadores que determinam quais elementos na árvore DOM serão estilizados pelas propriedades definidas.

```css
.element-class {
  /* ... */
}

[aria-hidden] {
  /* ... */
}
```

### Propriedades
Finalmente as propriedades, são elas quem dão aos elementos o seu estilo. Propriedades são pares de chave e valor.

```css
/* some selector */ {
  background: #f1f1f1;
  color: #333;
}
```

## CSS

### Formatação

* Use 2 espaços de identação;
* Prefira *dash-case* em vez de *calmeCase* nos nomes das classes;
* Sublinhados e dash-case quando estiver utilizando o [BEMCSS](http://getbem.com/);
* **Não use ID**;
* Ao usar vários seletores em uma única declaração, coloque cada seletor em sua * própria linha;
* Coloque espaço antes da chave de abertura `{` nas declarações de regras;
* Defina as propriedades em ordem alfabética;
* Nas propriedades, coloque um espaço após, mas não antes do caractere `: `;
* Coloque chave de fechamento `}` de declaração da regra em uma nova linha;
* Coloque uma linha em branco entre as declarações de regras.

**Ruim**

```css
/* Bad */
.card{
  border-radius: 5px;
  color: #333;
  background: #fafafa;
}
.no, .nope, .not__good {
  // ...
}
#no-way {
  // ...
}

/* Good */
.card {
  background: #fafafa;
  border-radius: 5px;
  color: #333;
}

.one,
.selector,
.per_line {
  // ...
}
```

### Comentários

* Prefira comentários em linha (`\\` Sass-land) para blocos de comentários;
* Prefira comentários em sua própria linha. Evite comentários ao final da linha;
* Escreva comentários detalhados para o código que não é auto-documentado:
  - Usos do `z-index`;
  - Compatibilidade com hacks específicos do navegador;

### OOCSS e BEM
Encorajamos a combinação de OOCSS e BEMCSS por estes motivos:

- Ajuda a criar uma ligação clara e estrita entre CSS e HTML;
- Ajuda a criar componentes reutilizáveis e composíveis;
- Permite menos aninhamento e menor especificidade;
- Ajuda na criação de folhas de estilo escaláveis;

**OOCSS** ou *Object Oriented CSS*, é uma abordagem para escrever CSS que o incentiva a pensar em suas folhas de estilo como uma coleção de "objetvos": snippets reutilizáveis e repetíveis que podem ser usados independentemente em todo o site.

#### Links úteis:
- Nicole Sullivan's [OOCSS Wiki](https://github.com/stubbornella/oocss/wiki);
- Smashing Magazine's [Introduction to OOCSS](https://www.smashingmagazine.com/2011/12/an-introduction-to-object-oriented-css-oocss/);

**BEMCSS** ou **B**lock **E**lement **M**odifier, é uma convenção de nomenclatura para classes em HTML e CSS. Foi originalmente desenvolvido pela Yandex com grandes bases de código e escalabilidade em mente e pode servir como um conjunto sólido de diretrizes para implementação do OOCSS.

Links úteis:
- CSS Trick's [BEM 101](https://css-tricks.com/bem-101/);
- Harry Hobert's [Introduction to BEMCSS](https://csswizardry.com/2013/01/mindbemding-getting-your-head-round-bem-syntax/);

Recomendamos uma variante do BEM com os "blocks" em *dash-case*. Alternativamente, você pode utilizar os prefixos de manipulação de estado .`is-*` para atuar com os modificadore, contudo lembrando de definir este padrão globalmente no projeto.

**Exemplo**

```jsx
// PostCard.jsx
function PostCard() {
  return (
    <article className="post-card post-card--featured">
      <h1 className="post-card__title">You are learning our pattern</h1>

      <div className="post-card__content">
        <p>Vestibulum id ligula porta felis euismod semper.</p>
      </div>
    </article>
  );
}
```

```css
/* PostCard.css */
.post-card {
  /* ... */
}

.post-card__title {
  /* ... */
}

.post-card--featured {
  /* ... */
}
```

- `.post-card` é o "bloco" e representa um componente de alto nível.
- `.post-card__title` é um "elemento" e representa um descendente de `.post-card` que ajuda a compor o bloco como um todo.
- `.post-card--featured` é um "modificador" e representa um estado diferente ou variação no bloco `.post-card`.

> Tips: De forma alternativa, você pode utilizar os prefixos `.is-*`, `.has-*` pertencente ao smacss. Apenas lembrando que caso opte por essa nomenclatura, ela deverá ser seguida em todo o projeto.

### Seletores ID
Sabemos que é possível selecionar elementos por meio do seu ID no CSS, porém isso deveria ser considerado um anti-padrão. Seletores do tipo ID introduzem um alto nível de [especificidade](https://developer.mozilla.org/en-US/docs/Web/CSS/Specificity) para suas declarações de regras e eles não são reutilizáveis.

 
Para mais detalhes, você pode ler o [artigo do CSS Wizardry](https://csswizardry.com/2014/07/hacks-for-dealing-with-specificity/) sobre como lidar com especificidade.

### Hooks JavaScript

Evite utilizar a mesma classe em ambos CSS e JavaScript. Isso pode acarretar sérias dores de cabeça depois, principalmente na refatoração, onde que um desenvolvedor pode alterar uma classe e era justamente ela que fazia a feature funcionar.

Recomendamos o uso de classes específicas para vincular ao JavaScript, ou até mesmo o uso dos atributos `data-*`.

```html
<button
  type="button"
  class="btn btn-download"
  data-component="download"
>
  Baixe nosso e-book
</button>
```

## Sass

### Sintaxe

- Utilize a sintaxe .scss, nunca a original .sass
- Ordene seu CSS e as declarações @include de forma lógica (veja logo abaixo)

### Ordenação das declarações
- Propriedades customizadas (ex, `--primary-color`).
- Variáveis Sass (ex, `$border-radius`).
- Declarações `@include` que não tenha escopo (ex, `@include green-box();`).
- Regras CSS.
- Declarações `@include` que tenham escopo (ex, `@include green-box { // ...code here };`).
- Seletores aninhados.
- At-rules (ex, `@media {}`).

```scss
.post-card {
  // custom-properties or css variables.
  --border-color: #07a;

  // sass-variable.
  $font-size: 14px;

  // include statement.
  @include transition(transform 0.3s ease-in-out);

  // css rules - alphabetical ordered.
  border: 1px solid var(--border-color, rgba(#fff, 0.5));
  max-width: 100%;
  transform: scale(0.8);
  width: 380px;

  // at-rules.
  @include hover {
    transform: scale(0);
  }

  // nested selector.
  &__content {
    font-size: $font-size;
  }

  &__title {
    font-size: $font-size + 3px;
  }

  @media(min-width: 1180px) {
    &__content {
      font-size: $font-size + 4px;
    }

    &__title {
      font-size: $font-size + 10px;
    }
  }
}
```

### Variáveis
Prefira nomes de variáveis no formato dash-cased (ex, `$my-variable`) do que camelCased ou ainda *snake_cased*. É aceitável prefixar com um sublinhado (ex, `$_my-variable`) nomes de variáveis que devem ser usadas somente no arquivo em que foram declaradas.

### Mixins
Mixins devem ser usados para **limpar** (DRY, Don't Repeat Yourself) o código, adicionar clareza ou abstrair certa complexidade - da mesma forma que funções (bem nomeadas). Mixins que não aceitam argumentos podem ser úteis para isso, mas observe que se você não estiver utilizando um compactador (ex, g-zip), isso pode contribuir para a duplicação desnecessária de código no resultado dos estilos.

### Diretiva `@extend`
A diretiva `@extend` deve ser evitada porque tem um comportamento não intuitivo e potencialmente perigoso, especialmente quando usada com seletores aninhados. Mesmo utilizando nos espaços de nível superior de seus seletores, pode causar problemas se a ordem dos seletores mudar posteriormente (por exemplo, se eles estiverem em outros arquivos e a ordem em que os arquivos são carregados mudar). O g-zip deve lidar com a maior parte da economia que você teria ganhado usando `@extend`, e você pode utilizar os mixins para dar uma limpada na sua folha de estilo.

### Seletores aninhados
**Não adicione mais do que 2 níveis de profundidade!**

```scss
// good
.page {
  // ...code

  .content {
    // ...code

    .profile {
      // STOP!
    }
  }
}

// much better
.page {
  // ...code

  &__content {
    // ...code

    .profile {
      // STOP!
    }
  }
}
```

Quando os seletores começam a se tornarem extensos, você provavelmente estará escrevendo CSS que:

- Fortemente **acoplado ao HTML** (frágil) -ou-
- Possui um **alto nível de especificidade** -ou-
- **Não reutilizável**.

> **Nunca aninhe seletores do tipo ID!**

Se você usar um seletor ID, em primeiro lugar (embora você realmente não deveria estar utilizando), eles **nunca devem ser aninhados**. Se você estiver fazendo isso, precisará rever sua marcação ou descobrir por que essa especificidade forte é necessária. Se estiver escrevento HTML e CSS bem formatados, **nunca precisará fazer isso**.

### Extensões VSCode
- [PostCSS Sorting](https://marketplace.visualstudio.com/items?itemName=mrmlnc.vscode-postcss-sorting)
> Ajuda na ordenação das declarações de acordo com o que foi definido pelo stylelint. (thanks @alefy)
