class Scroll {
    _selector = null;
    _behavior = null;
    _block = null;
    _inline = null;

    constructor(behavior = 'auto', block = 'start', inline = 'nearest', selector = 'a[href*="#"]') {
        this._selector = selector;
        this._behavior = behavior;
        this._block = block;
        this._inline = inline;
        this.animation();
    }

    animation() {
        const anchors = document.querySelectorAll(this._selector)
        for (let anchor of anchors) {
            anchor.addEventListener('click', (e) => {
                e.preventDefault()
                
                const blockID = anchor.getAttribute('href').substr(1)

                document.getElementById(blockID).scrollIntoView({
                    behavior: this._behavior,
                    block: this._block,
                    inline: this._inline
                })
            })
        }
    }
}