use aquarium_data;
SELECT 
	date_analysis from values_types_analysis
    inner join types_analysis on values_types_analysis.id_type_analysis = types_analysis.id_type_analysis
    inner join aquariums on types_analysis.id_aquarium = aquariums.id_aquarium
    where aquariums.id_aquarium = '3'
    GROUP BY date_analysis
    ORDER BY date_analysis DESC;