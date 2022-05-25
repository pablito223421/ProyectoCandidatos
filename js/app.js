const host = 'https://movemini.pythonanywhere.com'
//const host = 'http://127.0.0.1:5000'
const apiUrl = `${host}/api`

let store = {
  categories: [],
  articles: [],
  articlesFiltered: [],
  selectedCategory: null,
  selectedSubcategory: null,
  articleId: null,
}


function categoriesRender() {
  let ul = document.getElementById('category-list-wrapper')

  store.categories.forEach((category, index, arr) => {
    let li = document.createElement('li')
    li.setAttribute('class', 'nav-item')

    let a = document.createElement('a')
    a.setAttribute('class', 'nav-link')
    a.setAttribute('data-bs-toggle', 'collapses')
    a.setAttribute('aria-expanded', 'true')
    a.setAttribute('aria-controls', 'ui-basic')
    a.setAttribute('href', '#c' + index)
    a.setAttribute('id', 'c' + category.id)
    a.setAttribute('onClick', `return selectCategory(${category.id})`)

    let span = document.createElement('span')
    span.setAttribute('class', 'menu-title')

    /*
    let i = document.createElement('i')
    i.setAttribute('class', 'menu-arrow')
    */

    let subs = document.createElement('div')
    subs.setAttribute('class', 'collapse show')

    let flexCol = document.createElement('ul')
    flexCol.setAttribute('class', 'nav flex-columns sub-menu')
    category.subcategorias.forEach((subcategoria, si, sarr) => {
      let flexColLi = document.createElement('li')
      flexColLi.setAttribute('class', 'nav-item')
      flexColLi.setAttribute('id', `s${subcategoria.id}`)
      let aSub = document.createElement('a')
      aSub.setAttribute('class', 'nav-link')
      aSub.setAttribute('href', '#')
      aSub.setAttribute('onClick', `return selectSubcategory(${subcategoria.id}, ${category.id})`)
      aSub.innerHTML = subcategoria.nombre
      flexColLi.appendChild(aSub)
      flexCol.appendChild(flexColLi)
    })
    subs.appendChild(flexCol)

    a.appendChild(span)
    //a.appendChild(i)
    li.appendChild(a)
    li.appendChild(subs)
    ul.appendChild(li)

    span.innerHTML = span.innerHTML + category.nombre
  })
}


function categoriesFetch() {
  return fetch(`${apiUrl}/categorias`)
    .then(response => response.json())
    .then(result => {
      store.categories = result
      categoriesRender()
    })
}


function articlesRender() {
  let articlesElm = document.getElementById('articles')
  articlesElm.innerHTML = ''

  store.articlesFiltered.forEach((article, index, arr) => {
    let td

    let tr = document.createElement('tr')
    tr.setAttribute('id', `art${article.id}`)

    td = document.createElement('td')
    td.innerHTML = td.innerHTML + article.sku
    tr.appendChild(td)

    td = document.createElement('td')
    td.setAttribute('width', '40%')
    td.innerHTML = td.innerHTML + article.nombre
    tr.appendChild(td)

    td = document.createElement('td')
    td.setAttribute('class', 'text-center')
    td.innerHTML = td.innerHTML + article.stock_actual
    tr.appendChild(td)

    td = document.createElement('td')
    td.setAttribute('class', 'text-center')
    td.innerHTML = td.innerHTML + article.stock_minimo
    tr.appendChild(td)

    td = document.createElement('td')
    td.setAttribute('class', 'text-center')
    td.innerHTML = td.innerHTML + article.stock_maximo
    tr.appendChild(td)

    td = document.createElement('td')
    td.setAttribute('class', 'article-actions')

    let editElm = document.createElement('a')
    editElm.setAttribute('href', '#')
    let editIcon = document.createElement('i')
    editIcon.setAttribute('class', 'mdi mdi-lead-pencil text-muted')
    editElm.appendChild(editIcon)
    editElm.innerHTML = editElm.innerHTML + 'Editar'
    editElm.onclick = openNewArticleForm.bind(this, article.id)

    let deleteElm = document.createElement('a')
    deleteElm.setAttribute('href', '#')
    let deleteIcon = document.createElement('i')
    deleteIcon.setAttribute('class', 'mdi mdi-delete text-muted')
    deleteElm.appendChild(deleteIcon)
    deleteElm.innerHTML = deleteElm.innerHTML + 'Eliminar'
    deleteElm.onclick = openDeleteConfirmation.bind(this, article.id)

    let space = document.createElement('span')
    space.innerHTML = space.innerHTML + ' '

    td.appendChild(editElm)
    td.appendChild(space)
    td.appendChild(deleteElm)
    tr.appendChild(td)

    articlesElm.appendChild(tr)
  })

}


function articlesFetch() {
  return fetch(`${apiUrl}/productos`)
    .then(response => response.json())
    .then(result => {
      store.articles = result
      store.articlesFiltered = JSON.parse(JSON.stringify(result))
      articlesRender()
    })
}


function selectSubcategory(id, categoryId) {
  resetCategorySelection()

  store.articlesFiltered = store.articles.filter(article => article.subcategoria.id == id)
  articlesRender()

  store.selectedSubcategory = id
  let elm = document.getElementById(`s${id}`).getElementsByTagName('a')[0]
  elm.classList.add('active')

  store.selectedCategory = categoryId
  let cat = document.getElementById(`c${categoryId}`)
  cat.classList.add('text-primary')

  let category = store.categories.find(category => category.id == categoryId)
  let subcategory = category.subcategorias.find(subcategoria => subcategoria.id == id)
  let displayingCat = document.getElementById('displaying-cat')
  displayingCat.innerHTML = `${category.nombre} <span class="text-muted">/</span> ${subcategory.nombre}`


  let allCats = document.getElementById('all-cats-menu-item')
  allCats.classList.remove('active')

  return false
}


function resetCategorySelection() {
  if (store.selectedSubcategory) {
    let prevSelected = document.getElementById(`s${store.selectedSubcategory}`).getElementsByTagName('a')[0]
    prevSelected.classList.remove('active');
  }

  if (store.selectedCategory) {
    let prevSelected = document.getElementById(`c${store.selectedCategory}`)
    prevSelected.classList.remove('text-primary')
  }

  store.selectedCategory = null
  store.selectedSubcategory = null
}


function selectCategory(id) {
  resetCategorySelection()

  if (id) {
    store.articlesFiltered = store.articles.filter(article => article.categoria.id == id)
  } else {
    store.articlesFiltered = store.articles
  }

  articlesRender()

  let allCats = document.getElementById('all-cats-menu-item')
  let displayingCat = document.getElementById('displaying-cat')

  if (id) {
    store.selectedCategory = id
    let elm = document.getElementById(`c${id}`)
    elm.classList.add('text-primary')

    let category = store.categories.find(category => category.id == id)
    displayingCat.innerHTML = `${category.nombre}`

    allCats.classList.remove('active')
  } else {
    allCats.classList.add('active')
    displayingCat.innerHTML = 'Todas las categorías'
  }

  return false
}


function openNewArticleForm(id) {
  let articleForm = document.getElementById('article-form')
  articleForm.getElementsByTagName('form')[0].reset()
  articleForm.classList.remove('d-none')
  articleForm.style['display'] = 'block'

  let articleList = document.getElementById('article-list')
  articleList.style['display'] = 'none'

  let categoryInput = document.getElementById('categoria')
  categoryInput.innerHTML = ''
  let subcategoryInput = document.getElementById('subcategoria')
  subcategoryInput.innerHTML = ''

  let subcategoryWrapper = document.getElementById('subcategoria_wrapper')
  subcategoryWrapper.style['display'] = 'none'

  let title = articleForm.getElementsByClassName('title')[0]

  let article = null
  if (id) {
    article = store.articles.find(article => article.id == id)
    store.articleId = article.id
    title.innerHTML = 'Editar artículo'
  } else {
    store.articleId = null
    title.innerHTML = 'Nuevo artículo'
  }

  let option = document.createElement('option')
  option.setAttribute('value', '')
  option.setAttribute('hidden', 'hidden')
  option.innerHTML = option.innerHTML + 'Seleccionar categoría'
  categoryInput.appendChild(option)

  store.categories.forEach((category, index, arr) => {
    let option = document.createElement('option')

    option.innerHTML = option.innerHTML + category.nombre
    option.setAttribute('value', category.id)

    if ((store.selectedCategory == category.id && !article) || (article && article.categoria.id == category.id)) {
      option.setAttribute('selected', 'selected')

      subcategoryWrapper.classList.remove('d-none')
      subcategoryWrapper.style['display'] = 'block'

      let sOption = document.createElement('option')
      sOption.setAttribute('value', '')
      sOption.setAttribute('hidden', 'hidden')
      sOption.innerHTML = sOption.innerHTML + 'Seleccionar subcategoría'
      subcategoryInput.appendChild(sOption)

      category.subcategorias.forEach((subcategory, sindex, sarr) => {
        let sOption = document.createElement('option')
        sOption.innerHTML = sOption.innerHTML + subcategory.nombre
        sOption.setAttribute('value', subcategory.id)
        if ((store.selectedSubcategory == subcategory.id && !article) || (article && article.subcategoria.id == subcategory.id)) {
          sOption.setAttribute('selected', 'selected')
        }
        subcategoryInput.appendChild(sOption)
      })

      subcategoryWrapper.classList.remove('d-none')
      subcategoryWrapper.style['display'] = 'block'
    }

    option.onclick = function() {
      subcategoryInput.innerHTML = ''

      let sOption = document.createElement('option')
      sOption.setAttribute('value', '')
      sOption.setAttribute('hidden', 'hidden')
      sOption.innerHTML = sOption.innerHTML + 'Seleccionar subcategoría'
      subcategoryInput.appendChild(sOption)

      category.subcategorias.forEach((subcategory, sindex, sarr) => {
        let sOption = document.createElement('option')
        sOption.innerHTML = sOption.innerHTML + subcategory.nombre
        sOption.setAttribute('value', subcategory.id)
        subcategoryInput.appendChild(sOption)
      })

      subcategoryWrapper.classList.remove('d-none')
      subcategoryWrapper.style['display'] = 'block'
    }

    categoryInput.appendChild(option)
  })

  if (article) {
    document.getElementById('sku').value = article.sku
    document.getElementById('nombre').value = article.nombre
    document.getElementById('stock_actual').value = article.stock_actual
    document.getElementById('stock_minimo').value = article.stock_minimo
    document.getElementById('stock_maximo').value = article.stock_maximo
  }

  setTimeout(function() {
    document.getElementById('sku').focus()
  }, 500)

  return false
}


function closeDeleteConfirmation() {
  const deleteConfirmation = document.getElementById('delete-confirmation')
  deleteConfirmation.style['display'] = 'none'

  const articleList = document.getElementById('article-list')
  articleList.style['display'] = 'block'
}


function deleteArticle(id) {
  fetch(`${apiUrl}/productos/${id}`, {
    method: 'DELETE',
    headers: {
        'Content-Type': 'application/json',
    },
  })
    .then(response => {
      // TODO: encapsulate this to not repeat the code on every fetch
      if (!response.ok) {
        throw Error(response.statusText)
      }
      return response
    })
    .then(response => response.json())
    .then(result => {
      store.articles = store.articles.filter(x => x.id != id)
      store.articlesFiltered = store.articlesFiltered.filter(x => x.id != id)
      articlesRender()
      closeDeleteConfirmation()
    })
    .catch(error => {
      alert('Error: ' + error)
      console.log('error', error)
    })
}


function openDeleteConfirmation(id) {
  let deleteConfirmation = document.getElementById('delete-confirmation')
  deleteConfirmation.classList.remove('d-none')
  deleteConfirmation.style['display'] = 'block'

  let article = store.articles.find(article => article.id == id)
  let articleNameElm = deleteConfirmation.getElementsByClassName('article-name')[0]
  articleNameElm.innerHTML = article.nombre

  let yesElm = deleteConfirmation.getElementsByClassName('yes')[0]
  yesElm.onclick = deleteArticle.bind(this, id)

  return false
}


function numbersOnly(field, evt) {
  let key
  let keychar

  if (window.event) {
    key = window.event.keyCode
  } else if (evt) {
    key = e.which
  } else {
    return true
  }

  keychar = String.fromCharCode(key)

  // Control keys
  if ((key==null) || (key==0) || (key==8) || (key==9) || (key==13) || (key==27) ) {
    return true

  // Numbers
  } else if ('0123456789'.indexOf(keychar) > -1) {
    return true

  } else {
    return false
  }
}


function validateLength(maxLength, id, evt) {
  let elm = document.getElementById(id)
  if (elm.value.length >= maxLength) {
    return false
  }
  if (evt.clipboardData) {
    let txt = evt.clipboardData.getData('Text')
    if (txt.length > maxLength || elm.value.length + txt.length > maxLength) {
      return false
    }
  }
  return true
}


function cleanArticle(article) {
  let sku = article.sku.trim()
  let nombre = article.nombre.trim()
  let categoria = parseInt(article.categoria.trim())
  let subcategoria = parseInt(article.subcategoria.trim())
  let stock_actual = parseInt(article.stock_actual.trim())
  let stock_minimo = parseInt(article.stock_minimo.trim())

  let stock_maximo = parseInt(article.stock_maximo.trim())
  if (isNaN(stock_maximo)) {
    stock_maximo = 0
  }

  let cleaned = {
    sku: sku,
    nombre: nombre,
    categoria: categoria,
    subcategoria: subcategoria,
    stock_actual: stock_actual,
    stock_minimo: stock_minimo,
    stock_maximo: stock_maximo,
  }

  return cleaned
}


function validateArticle(article) {
  let sku = article.sku.trim()
  let nombre = article.nombre.trim()
  let categoria = article.categoria.trim()
  let subcategoria = article.subcategoria.trim()
  let stock_actual = article.stock_actual.trim()
  let stock_minimo = article.stock_minimo.trim()
  let stock_maximo = article.stock_maximo.trim()

  let errors = {
    global: [],
    sku: [],
    nombre: [],
    categoria: [],
    subcategoria: [],
    stock_actual: [],
    stock_minimo: [],
    stock_maximo: [],
  }

  let isValid = true
  if (!sku.length) {
    isValid = false
    errors.sku.push('Este campo es requerido')
  }
  if (!nombre.length) {
    isValid = false
    errors.nombre.push('Este campo es requerido')
  }
  if (!categoria.length) {
    isValid = false
    errors.categoria.push('Este campo es requerido')
  }
  if (!subcategoria.length) {
    isValid = false
    errors.subcategoria.push('Este campo es requerido')
  }
  if (!stock_actual.length) {
    isValid = false
    errors.stock_actual.push('Este campo es requerido')
  }
  if (!stock_minimo.length) {
    isValid = false
    errors.stock_minimo.push('Este campo es requerido')
  }

  return [isValid, errors]
}


function closeArticleForm() {
  const articleForm = document.getElementById('article-form')
  articleForm.style['display'] = 'none'

  const articleList = document.getElementById('article-list')
  articleList.style['display'] = 'block'

  let elms = document.getElementsByClassName('field-errors')
  Array.from(elms).forEach(elm => {
    elm.innerHTML = ''
  })

  store.articleId = null
}


function displayErrors(errors) {
  for (let field in errors) {
    let elm = document.getElementById(`${field}-errors`)
    if (!elm) continue
    elm.innerHTML = ''
    errors[field].forEach(message => {
      let li = document.createElement('li')
      li.innerHTML = message
      elm.appendChild(li)
      if (field == 'global') {
        let br = document.createElement('br')
        elm.appendChild(br)
      }
    })
  }
}


function highlightArticle(id) {
  let elms = document.getElementsByClassName('highlighted-article')
  Array.from(elms).forEach(elm => {
    elm.classList.remove('highlighted-article')
  })

  let elm = document.getElementById(`art${id}`)
  elm.classList.add('highlighted-article')
}


function saveArticle() {
  let article = {
    sku: document.getElementById('sku').value,
    nombre: document.getElementById('nombre').value,
    categoria: document.getElementById('categoria').value,
    subcategoria: document.getElementById('subcategoria').value,
    stock_actual: document.getElementById('stock_actual').value,
    stock_minimo: document.getElementById('stock_minimo').value,
    stock_maximo: document.getElementById('stock_maximo').value,
  }

  let [isValid, errors] = validateArticle(article)
  if (!isValid) {
    displayErrors(errors)
    return false
  }

  let cleaned = cleanArticle(article)

  // TODO: move to function and use async/await
  if (store.articleId) {
    fetch(`${apiUrl}/productos/${store.articleId}`, {
      method: 'PUT',
      headers: {
          'Content-Type': 'application/json',
      },
      body: JSON.stringify(cleaned)
    })
      .then(response => {
        return new Promise((resolve) => response.json()
          .then((result) => resolve({
            status: response.status,
            ok: response.ok,
            result,
          })))
      })
      .then(({ status, result, ok }) => {
        if (!ok) {
          if (result.mensaje) {
            displayErrors({'global': [result.mensaje]})
          }
          return false
        }

        let foundIndex = store.articles.findIndex(x => x.id == store.articleId)
        store.articles[foundIndex] = result

        foundIndex = store.articlesFiltered.findIndex(x => x.id == store.articleId)
        store.articlesFiltered[foundIndex] = result

        articlesRender()
        highlightArticle(result.id)
        closeArticleForm()
        return false
      })
      .catch(error => {
        alert('Error: ' + error)
        console.log('error', error)
        return false
      })
  } else {
    fetch(`${apiUrl}/productos`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(cleaned),
    })
      .then(response => {
        return new Promise((resolve) => response.json()
          .then((result) => resolve({
            status: response.status,
            ok: response.ok,
            result,
          })))
      })
      .then(({ status, result, ok }) => {
        if (!ok) {
          if (result.mensaje) {
            displayErrors({'global': [result.mensaje]})
          }
          return false
        }

        store.articles.unshift(result)
        store.articlesFiltered.unshift(result)
        articlesRender()
        highlightArticle(result.id)
        closeArticleForm()
        return result
      })
      .catch(error => {
        alert('Error: ' + error)
        console.log('error', error)
        return false
      })
  }

  return false
}


function openCSVForm() {
  let uploadCSVForm = document.getElementById('upload-csv-form')
  uploadCSVForm.getElementsByTagName('form')[0].reset()
  uploadCSVForm.classList.remove('d-none')
  uploadCSVForm.style['display'] = 'block'

  let articleList = document.getElementById('article-list')
  articleList.style['display'] = 'none'
}


function closeCSVForm() {
  const CSVForm = document.getElementById('upload-csv-form')
  CSVForm.style['display'] = 'none'

  const articleList = document.getElementById('article-list')
  articleList.style['display'] = 'block'
}


function uploadCSV() {
  let input = document.getElementById('upload-csv-form').querySelector('input[type="file"]')
  var data = new FormData()
  data.append('csv', input.files[0])

  fetch(`${apiUrl}/subir-csv`, {
    method: 'POST',
    body: data
  })
    .then(response => {
      return new Promise((resolve) => response.json()
        .then((result) => resolve({
          status: response.status,
          ok: response.ok,
          result,
        })))
    })
    .then(({ status, result, ok }) => {
      if (!ok) {
        alert('Error: ' + result.mensaje)
        return false
      }
      articlesFetch()
      resetCategorySelection()
      closeCSVForm()
    })
    .catch(error => {
      alert('Error: ' + error)
      console.log('error', error)
    })
  return false
}


function toggleSidebar() {
  let sidebar = document.getElementById('sidebar')
  if (window.getComputedStyle(sidebar, null).display == 'none') {
    sidebar.style['display'] = 'block'
  } else {
    sidebar.style['display'] = 'none'
  }
}


function initApp() {
  categoriesFetch()
  articlesFetch()

  let deleteConfirmationNo = document.getElementById('delete-confirmation').getElementsByClassName('no')[0]
  deleteConfirmationNo.onclick = closeDeleteConfirmation
  let deleteConfirmationClose = document.getElementById('delete-confirmation').getElementsByClassName('close-btn')[0]
  deleteConfirmationClose.onclick = closeDeleteConfirmation

  let newButton = document.getElementById('new-article-btn')
  newButton.onclick = function() {
    openNewArticleForm()
  }

  // Article form
  // ------------

  let articleForm = document.getElementById('article-form').getElementsByTagName('form')[0]
  articleForm.onsubmit = saveArticle

  let closeArticleButtons = document.getElementById('article-form').getElementsByClassName('close')
  for (let i = 0; i < closeArticleButtons.length; i++) {
    let button = closeArticleButtons[i]
    button.onclick = closeArticleForm
  }

  let currentStockInput = document.getElementById('stock_actual')
  currentStockInput.onkeypress = numbersOnly
  let minStockInput = document.getElementById('stock_minimo')
  minStockInput.onkeypress = numbersOnly
  let maxStockInput = document.getElementById('stock_maximo')
  maxStockInput.onkeypress = numbersOnly
  let skuInput = document.getElementById('sku')
  skuInput.onkeypress = validateLength.bind(this, 15, 'sku')
  skuInput.onpaste = validateLength.bind(this, 15, 'sku')
  let nombreInput = document.getElementById('nombre')
  nombreInput.onkeypress = validateLength.bind(this, 128, 'nombre')
  nombreInput.onpaste = validateLength.bind(this, 128, 'sku')

  // CSV
  // ---

  let uploadCSVButton= document.getElementById('upload-csv-btn')
  uploadCSVButton.onclick = openCSVForm

  let uploadCSVForm = document.getElementById('upload-csv-form').getElementsByTagName('form')[0]
  uploadCSVForm.onsubmit = uploadCSV

  let closeCSVButtons = document.getElementById('upload-csv-form').getElementsByClassName('close')
  for (let i = 0; i < closeCSVButtons.length; i++) {
    let button = closeCSVButtons[i]
    button.onclick = closeCSVForm
  }

  const navbarToggler = document.getElementsByClassName('navbar-toggler')[0]
  navbarToggler.onclick = toggleSidebar
}


initApp()
