--Tablas para la consulta
--select * from Sales.SalesPersonQuotaHistory
--select * from Person.Person

--Solucion
select P.BusinessEntityID, YEAR(S.QuotaDate) AS Year, SUM(S.SalesQuota) AS TotalSales
from Sales.SalesPersonQuotaHistory AS S inner join 
Person.Person AS P ON S.BusinessEntityID = P.BusinessEntityID
group by P.BusinessEntityID, YEAR(S.QuotaDate);