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

function showOnLoad(elem)
{
	addLoadEvent(partial(makeVisible,elem));
}

function int_divide(x, y) {
    if (x == 0) return 0;
    if (y == 0) return false;
    return (x - (x % y)) / y;
}