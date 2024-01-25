select  min(Id), 
		min(Id_Route) as Id_Route, 
		min(Delivery_Date) as Delivery_Date,
		min(Id_split) as Id_split,
		[Status]
from dbo.tabla_prueba 
where Id_split > 0 and Status = 1
group by [Status]