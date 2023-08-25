<section>
    <article>First Article</article>
    <article>Second Article</article>
    <article>
        <div>
            <button>Button 1</button>
            <button>Button 2</button>
            <button>Button 3</button>
            <button>Button 4</button>
            <button>Button 5</button>
        </div>
        <div>Div 2</div>
        <div>Div 3</div>
    </article>
</section>
<style :scope>
    section {
        display: flex;
    }

    article {
        flex: 1 200px;
    }

    article:nth-of-type(3) {
        flex: 3 200px;
        display: flex;
        flex-flow: column;
    }

    article:nth-of-type(3) div:first-child {
        flex: 1 100px;
        display: flex;
        flex-flow: row wrap;
        align-items: center;
        justify-content: space-around;
    }

    button {
        flex: 1 auto;
        margin: 5px;
        font-size: 18px;
        line-height: 1.5;
    }
</style>