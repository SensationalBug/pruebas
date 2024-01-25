select  Id_Route, 
		min(Delivery_Date) as Delivery_Date, 
		min(ID_Split) as ID_Split,
		[Status]
from tabla_prueba 
where Status = 1 and ID_Split > 0
group by Id_Route, [Status]
