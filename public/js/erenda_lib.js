function toggleVisible(elem) 
{
	var domElem = $(elem)
    toggleElementClass("invisible", elem);
}

function makeVisible(elem) 
{
	var domElem = $(elem);
	removeElementClass(elem, "invisible");
}

function makeInvisible(elem) 
{
	addElementClass(elem, "invisible");
}

function isVisible(elem) 
{
    return !hasElementClass(elem, "invisible");
}
