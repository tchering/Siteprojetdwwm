if(window.innerWidth > 561){


class carousel { // Déclaration de la class (a ne pas confondre avec la class CSS)

    /**
     * @param {HTMLElement} element 
     * @param {Object} options 
     * @param {Object} options.slidesToScroll Nombre d'element a faire défiler 
     * @param {Object} options.slidesVisible Nombre d'element visible dans un slide
     */

    constructor (element, options = {}){ // option déclarer en tant que objet avec ( = {})
        this.element= element            // This viens pointer sur le parametre du construtor selon ca déclaration
        this.options = Object.assign({}, {
            slidesToScroll: 1,
            slidesVisible: 2
        }, options)
        let children = [].slice.call(element.children) // déclaration tableau vide
        this.curentItem =0
        this.root = this.createDivWithClass('contain')
        this.container = this.createDivWithClass('carrousel__panorama')
        this.root.appendChild(this.container)
        this.element.appendChild(this.root)
        this.items = children.map((child) => {
            let item = this.createDivWithClass('carrousel__item')
            item.style.display = 'flex'
            item.appendChild(child)
            this.container.appendChild(item)
            return item
        });
        this.setStyle()
        this.createNavig()
    }

    

    setStyle(){
        let ratio = this.items.length / this.options.slidesVisible
        this.container.style.width = (ratio * 100)+'%'
        this.items.forEach( item => item.style.width = ((100 / this.options.slidesVisible) / ratio) + "%")
    }

    createNavig(){
        let nextBtn = this.createDivWithClass('next_slide')
        let prevBtn = this.createDivWithClass('prev_slide')
        this.root.appendChild(nextBtn)
        this.root.appendChild(prevBtn)
        nextBtn.addEventListener('click', this.next.bind(this))
        prevBtn.addEventListener('click', this.prev.bind(this))
    }

    next() {
        this.gotItem(this.curentItem + this.options.slidesToScroll) 
    }

    prev() {
        this.gotItem(this.curentItem - this.options.slidesToScroll)
    }
    
    /**
     * 
     * @param {number} index 
     */

    gotItem(index) {
        const retourCarrousel = this.items.length - 3
        if(index < 0){
            index = this.items.length - this.options.slidesVisible
        }else if(index > retourCarrousel ){
            index = 0
        }
        let translateX = index * -100 / this.items.length 
        console.log(translateX)
        this.container.style.transform = 'translate3d('+ translateX +'%, 0, 0)'
        this.curentItem = index
    }

    /**
     * 
     * @param {string} className 
     * @returns {HTMLElement}
     */
    createDivWithClass(className){
        let div = document.createElement('div')
        div.setAttribute('class', className)
        return div
    }
}

// ecoute de l'evenement chargement de la page
// addEventListener ecoute l'evenement 'DOMContentLoaded'
// DOMContentLoaded = Chargement du contenu de la page web
document.addEventListener('DOMContentLoaded', function() {
    // Utilisation de 'new' pour crée une nouvelle class 
    // class prend deux paramètres 1. selection de la zone ou executer le code avec querySelector
    //                             2.
    
    const carousels = document.getElementsByClassName('containers_carrousels');
    Array.from(carousels).forEach(carouselElement => {
        new carousel(carouselElement, {
            
            slidesToScroll: 1,
            slidesVisible: 3
        })
    })
})
}