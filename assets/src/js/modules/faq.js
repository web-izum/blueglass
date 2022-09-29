const faq = (classFaqBlock, classFaqItem, classFaqQuestion, classFaqAnswer ) => {

    const FAQ_BLOCK = document.querySelectorAll(classFaqBlock);

    FAQ_BLOCK.forEach(faqBlockItem => {

        const FAQ_ITEM = faqBlockItem.querySelectorAll(classFaqItem);

        FAQ_ITEM.forEach(item => {
            const FAQ_QUESTION = item.querySelector(classFaqQuestion);
            const FAQ_ANSWER = item.querySelector(classFaqAnswer);

            item.classList.add('close');

            FAQ_QUESTION.addEventListener('click', () => {

                item.classList.toggle('close');
            })
        })
    });
}

export default faq;