<?php
// This file was auto-generated from sdk-root/src/data/redshift/2012-12-01/waiters-2.json
return [ 'version' => 2, 'waiters' => [ 'ClusterAvailable' => [ 'acceptors' => [ [ 'argument' => 'Clusters[].ClusterStatus', 'expected' => 'available', 'matcher' => 'pathAll', 'state' => 'success', ], [ 'argument' => 'Clusters[].ClusterStatus', 'expected' => 'deleting', 'matcher' => 'pathAny', 'state' => 'failure', ], [ 'expected' => 'ClusterNotFound', 'matcher' => 'error', 'state' => 'retry', ], ], 'delay' => 60, 'maxAttempts' => 30, 'operation' => 'DescribeClusters', ], 'ClusterDeleted' => [ 'acceptors' => [ [ 'expected' => 'ClusterNotFound', 'matcher' => 'error', 'state' => 'success', ], [ 'argument' => 'Clusters[].ClusterStatus', 'expected' => 'creating', 'matcher' => 'pathAny', 'state' => 'failure', ], [ 'argument' => 'Clusters[].ClusterStatus', 'expected' => 'pathAny', 'matcher' => 'pathList', 'state' => 'failure', ], ], 'delay' => 60, 'maxAttempts' => 30, 'operation' => 'DescribeClusters', ], 'ClusterRestored' => [ 'acceptors' => [ [ 'argument' => 'Clusters[].RestoreStatus.Status', 'expected' => 'completed', 'matcher' => 'pathAll', 'state' => 'success', ], [ 'argument' => 'Clusters[].ClusterStatus', 'expected' => 'deleting', 'matcher' => 'pathAny', 'state' => 'failure', ], ], 'delay' => 60, 'maxAttempts' => 30, 'operation' => 'DescribeClusters', ], 'SnapshotAvailable' => [ 'acceptors' => [ [ 'argument' => 'Snapshots[].Status', 'expected' => 'available', 'matcher' => 'pathAll', 'state' => 'success', ], [ 'argument' => 'Snapshots[].Status', 'expected' => 'failed', 'matcher' => 'pathAny', 'state' => 'failure', ], [ 'argument' => 'Snapshots[].Status', 'expected' => 'deleted', 'matcher' => 'pathAny', 'state' => 'failure', ], ], 'delay' => 15, 'maxAttempts' => 20, 'operation' => 'DescribeClusterSnapshots', ], ],];
